<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Analytics;
use Carbon\Carbon;
use Spatie\Analytics\Period;

class DashboardController extends Controller
{
    public function index()
    {
        $startDate = Carbon::now()->subDay();
        $endDate = Carbon::now();
        $period=Period::create($startDate, $endDate);
        $data=Analytics::fetchVisitorsAndPageViews($period);
        $data=collect($data)->map(function($item){
            return [
                'date'=>$item['date'],
                'visitors'=>$item['visitors'],
                'pageViews'=>$item['pageViews'],
            ];
        });
        $data=$data->all();
        if($data == null){
          dd('مشکل در اتصال');  
        }else{
            $pageview=$data[0]['pageViews'];
            $visitor=$data[0]['visitors'];
        }
       
       


        return view('admin.page.dashboard', compact('pageview'));
    }
}