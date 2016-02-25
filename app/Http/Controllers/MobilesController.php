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
        return $request->all();
    }

    public function index(Request $request)
    {
        $perPageSelect = [5, 8, 12, 24];

        $perPage = $request->get('perPage', 8);
        $brandId = $request->get('brandId', 0);

        $brands = Brand::all();
        $mobiles = Mobile::withBrand($brandId)->paginate($perPage);

        $viewResponse = view('search.result',
            compact('mobiles', 'brands', 'perPageSelect', 'brandId')
        );

        return $viewResponse;
    }
        
}
