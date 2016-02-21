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
        $perPageSelect = [5, 10, 15, 20];

        $perPage = $request->get('perPage', 10);

        $mobiles = Mobile::paginate($perPage);


        return view('search.result', compact('mobiles', 'perPageSelect'));
    }
        
}
