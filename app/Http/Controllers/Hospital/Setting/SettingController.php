<?php

namespace App\Http\Controllers\Hospital\Setting;

use App\Http\Controllers\Controller;
use App\Http\Traits\Image;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use Image;
    public function __construct()
    {
        $this->middleware('permission:عرض-الإعدادات',['only'=>['index','update']]);
    }

    public function index()
    {
        $setting = Setting::latest()->first();
        return view('Hospital.pages.settings.index',compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::latest()->first();
        $data = $request->all();
        if($request->hasFile('logo'))
        {
            $this->deleteImage('Images/'.$setting->logo);
            $logo = $this->imageUpload('settings',$request->file('logo'));
            //$request->request->add(['photo'=>$image]);
            $data['logo'] = $logo;
        }

        if($request->hasFile('icon'))
        {
            $this->deleteImage('Hospital/Images/'.$setting->icon);
            $icon = $this->imageUpload('settings',$request->file('icon'));
           // $request->request->add(['photo'=>$image]);
            $data['icon'] = $icon;
        }
        $setting = Setting::orderBy('id','desc')->update($data);
        if (!$setting)
        {
            return 'error';
        }
        return 'done';
    }
}
