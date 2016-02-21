<?php

namespace App\Http\Controllers;

use App\Mobile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MobilesController extends Controller
{

    public function search(Request $request)
    {
        $perPage = $request->get('perPage', 10);

        $mobiles = Mobile::simplePaginate($perPage);


        return view('search.result', compact('mobiles', 'perPage'));
    }
        
}
