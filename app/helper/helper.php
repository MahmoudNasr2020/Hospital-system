<?php


namespace App\helper;


use App\Models\Setting;

if(!function_exists('settings'))
{
    function settings()
    {
       return $settings = Setting::latest()->first();
    }
}

if(!function_exists('sidebar'))
{
    function sidebar($params)
    {
        return request()->segment(2) == $params ? 'active' :'';
    }
}
