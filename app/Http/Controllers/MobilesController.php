<?php

namespace App\Http\Controllers;

use DB;
use App\Mobile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobilesController extends Controller
{

    public function search(Request $request)
    {
        $perPageSelect = [5, 10, 15, 20];

        $perPage = $request->get('perPage', 10);

        DB::enableQueryLog();

        $mobiles = Mobile::with('brand')->paginate($perPage);

        $viewResponse = view('search.result', compact('mobiles', 'perPageSelect'));

        var_dump(DB::getQueryLog());

        DB::disableQueryLog();

        return $viewResponse;
    }
        
}
