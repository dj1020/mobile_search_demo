<?php

namespace App\Http\Controllers;

use App\Brand;
use App\MobileDescription;
use DB;
use App\Mobile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobilesController extends Controller
{

    public function index(Request $request)
    {
        $perPageSelect = [5, 8, 12, 24];

        $perPage = $request->has('perPage') ? request('perPage') : 8;
        $brandId = $request->has('brandId') ? request('brandId') : 0;
        $smallestMonitorSize = $request->has('smallest_size') ? request('smallest_size') : 0;
        $biggestMonitorSize = $request->has('biggest_size') ? request('biggest_size') : 100;

        $brands = Brand::all();
        $mobiles = Mobile::withBrand($brandId)
            ->where('monitor_size', '>=', $smallestMonitorSize)
            ->where('monitor_size', '<=', $biggestMonitorSize)
            ->orderby('id', 'DESC')
            ->orderby('created_at', 'DESC');

        if ( $request->has('has_memory_slot') ) {
            $mobiles = $mobiles->where('has_memory_slot', $request->get('has_memory_slot'));
        }

        if ( $request->has('rom') ) {
            $mobiles = $mobiles->withRomSize($request->get('rom'));
        }

        $mobiles = $mobiles->paginate($perPage);

        $brandList = [0 => '-- ALL --'] + array_combine(
                Brand::lists('id')->all(),
                Brand::lists('name')->all()
            );

        $perPageList = array_combine($perPageSelect, $perPageSelect);

        $request->flash(); // 把所有 request 參數放進 session，可用 old 取出
        $viewResponse = view(
            'mobiles.search',
            compact('mobiles', 'brands', 'perPageSelect', 'brandId', 'brandList', 'perPageList')
        )->with(compact('request'));

        return $viewResponse;
    }

    public function create()
    {
        $brands = Brand::all();

        return view('mobiles.create', compact('brands'));
    }

    public function store(Request $request)
    {
        return $request->all();

        $inputs = $request->except('_token');

        $mobileImg = $request->file('mobile_image');
        if ($mobileImg) {
            $brand = Brand::findOrFail($request->get('brand_id'));
            $path = public_path('img/' . $brand->name);
            $filename = $mobileImg->getClientOriginalName();
            $mobileImg->move($path, $filename);
            $inputs = array_merge($inputs, ['pic' => "/img/{$brand->name}/$filename"]);
        }

        $mobile = Mobile::create($inputs);

//        $mobile->description()->create([
//            'content' => $inputs['mobile_description']
//        ]);

        MobileDescription::create([
            'content' => $inputs['mobile_description'],
            'mobile_id' => $mobile->id,
        ]);

        return redirect('/mobiles');
    }

    /**
     * http://mobilesearch.dev/mobiles/{id}
     *
     * @param $mobileId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($mobileId)
    {
        $brands = Brand::all();
        $mobile = Mobile::with('description')->find($mobileId);

        return view('mobiles.show', compact('brands', 'mobile'));
    }

    /**
     * DELETE /mobiles/{id}
     *
     * @param $mobileId
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($mobileId)
    {
        $mobile = Mobile::findOrFail($mobileId);

        $mobile->delete();

        return response()->json([
            'status' => true,
            'message' => 'Mobile ' . $mobile->id . ' deleted',
        ]);
    }

    public function multiDestroy(Request $request)
    {
        $ids = $request->get('ids', []);

        return $ids;

        foreach($ids as $id) {
            $this->destroy($id);
        }

        return response()->json([
            'status' => true,
            'message' => 'Mobile ' . implode(', ', $ids) . ' deleted',
        ]);
    }

    public function releasePage($mobileId)
    {
        $brands = Brand::all();
        $mobile = Mobile::findOrFail($mobileId);

        return view('mobiles.release', compact('brands', 'mobile'));
    }

    public function release($mobileId)
    {
        $mobile = Mobile::findOrFail($mobileId);
        $mobile->release();

        return back();
    }

    public function unrelease($mobileId)
    {
        $mobile = Mobile::findOrFail($mobileId);
        $mobile->unrelease();

        return back();
    }

}
