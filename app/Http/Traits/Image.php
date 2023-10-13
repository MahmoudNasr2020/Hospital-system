<?php /** @noinspection PhpUnused */


namespace App\Http\Traits;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait Image
{
    /** @noinspection PhpUnused */
    public function imageUpload($folder,$image)
    {
        $image_name = time().$image->hashName();
        $image->storeAs($folder,$image_name);
        return $folder .'/'.$image_name;
    }

    public function deleteImage($path)
    {
        if(File::exists($path))
        {
            if(!Str::contains($path,'default.png'))
            {
                File::delete(public_path($path));
            }
        }
    }
}
