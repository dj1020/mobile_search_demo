<?php

namespace App\Http\Controllers;

use App\Brand;
use App\MobileDescription;
use DB;
use App\Mobile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ExcelController extends Controller
{

    public function export()
    {
        $info = Mobile::limit(10)->get();

        var_dump($info->toArray());

        return $info;
    }

    public function exportMobiles()
    {
        $export = Mobile::all()->toArray();
//        foreach ($info as $key => $value) {
//            $export[] = array(
//                'ID' => $value['id'],
//                '姓名' => $value['name'],
//                '性別' => $value['mobile'],
//                '電話' => $value['mobile'],
//                '愛好' => $value['hobby'],
//            );
//        }
        $tab_name = 'mobiles';
        Excel::create('export_mobiles', function ($excel) use ($export) {
            $excel->sheet('mobiles', function ($sheet) use ($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }

}
