<?php

use Carbon\Carbon;

if (!function_exists('generateImageName')) {
    function generateImageName($extension)
    {
        $date_now=Carbon::now();
        $year = $date_now->year;
        $month =$date_now->month;
        $day = $date_now->day;
        $hour = $date_now->hour;
        $minute = $date_now->minute;
        $second = $date_now->second;
        $microsecond = $date_now->microsecond;
        return $year . $month . $day . $hour . $minute . $second . $microsecond . '.'. $extension;
    }
}
if (!function_exists('Persian_GenerateImageName')) {
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
