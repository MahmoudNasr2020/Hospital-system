<?php

namespace App\Http\classes;

use App\Http\Traits\Image;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Member
{
    use Image;
    /** @noinspection PhpUndefinedMethodInspection */
    public function store($model, $request,$image)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload($image,$request->image);
            $request->merge('image',$image);
        }
        DB::beginTransaction();
        $user = User::create($request->only(['name','email','password'=>Hash::make($request->password)]));
        $member = $model::create($request->except(['name','email','password']));
        if (!$user || !$member)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }
}
