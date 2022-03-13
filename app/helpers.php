<?php

use Carbon\Carbon;

if (!function_exists('generateImageName')) {
    function generateImageName($extension)
    {
        $year = Carbon::now()->year;
        $month = Carbon::now()->month;
        $day = Carbon::now()->day;
        $hour = Carbon::now()->hour;
        $minute = Carbon::now()->minute;
        $second = Carbon::now()->second;
        $microsecond = Carbon::now()->microsecond;
        return $year . $month . $day . $hour . $minute . $second . $microsecond . '.'. $extension;
    }
}
if (!function_exists('PertiongenerateImageName')) {
    function Persian_GenerateImageName($extension)
    {
        $v = verta();
        $v->timezone = 'Asia/Tehran';
        $year=$v->year;
        $month=$v->month; 
        $day=$v->day; 
        $hour=$v->hour; 
        $minute=$v->minute; 
        $second=$v->second;
        $micro=$v->micro;
        return $year . $month . $day . $hour .$minute . $second . $micro .'.'. $extension;
    }
}
?>