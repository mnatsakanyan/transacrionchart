<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartDataController extends Controller
{
    public function index($id){

        $chartData = Chart::with("transactions")->where("id",2)->first();

        $data = [
            "data"=>$chartData
        ];
        return view("admin.chart_data.index",$data);
    }
}
