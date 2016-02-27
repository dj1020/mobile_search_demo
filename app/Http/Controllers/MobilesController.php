<?php

namespace App\Http\Controllers;

use App\Brand;
use DB;
use App\Mobile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobilesController extends Controller
{

    public function create()
    {
        $brands = Brand::all();

        return view('mobiles.create', compact('brands'));
    }

    public function store(Request $request)
    {
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

        return redirect('/mobiles');
    }

    public function index(Request $request)
    {
        $perPageSelect = [5, 8, 12, 24];

        $perPage = $request->get('perPage', 8);
        $brandId = $request->get('brandId', 0);

        $brands = Brand::all();
        $mobiles = Mobile::withBrand($brandId)
            ->orderby('id', 'DESC')
            ->orderby('created_at', 'DESC')
            ->paginate($perPage);

        $viewResponse = view('mobiles.search',
            compact('mobiles', 'brands', 'perPageSelect', 'brandId')
        );

        return $viewResponse;
    }

}
