<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\AdminRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AdminRepoistory implements AdminRepositoryInterface
{

    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.admins.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('Hospital.pages.admins.components.include.add',compact('roles'));
    }

    public function store($request)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload('admins',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        $request->request->add(['user_type'=>'admin']);
        $request->merge(['password'=>Hash::make($request->password)]);
        DB::beginTransaction();
        $user = User::create($request->only(['name','user_name','password','user_type','status','photo']));
        $roles = $user->assignRole($request->roles);
        if (!$user || !$roles)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }

    public function show($id)
    {
        $data = User::findOrFail($id);
        return view('Hospital.pages.admins.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = User::findOrFail($data);
        $roles = Role::get();
        $data_roles = $data->roles->pluck('name')->toArray();
        return view('Hospital.pages.admins.components.include.edit',compact('data','roles','data_roles'));
    }

    public function update($request,$id)
    {
        $data = User::find($id);
        if(!$data)
        {
            return 'error';
        }
        if($request->has('password'))
        {
            $request->merge(['password'=>Hash::make($request->password)]);
        }
        if($request->hasFile('image'))
        {
            $this->deleteImage('Hospital/Images/'.$data->photo);
            $image = $this->imageUpload('admins',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        DB::beginTransaction();
        $user = $data->update($request->only(['name','user_name','password','status','photo']));
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $roles = $data->assignRole($request->roles);
        if (!$user || !$roles)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';
    }

    public function delete($model,$item)
    {
        $item = $model::find($item);
        if(!$item)
        {
            return 'error';
        }
        $this->deleteImage('Hospital/Images/admins/'.$item->photo);
        DB::table('model_has_roles')->where('model_id',$item->id)->delete();
        $item->delete();
        return 'done';
    }



    public function multi_delete($model,array $data)
    {
        foreach ($data as $item)
        {
            $item = $model::findOrFail($item);
            $this->deleteImage('Hospital/Images/admins/'.$item->photo);
            DB::table('model_has_roles')->where('model_id',$item->id)->delete();
            $item->delete();
        }
        return 'done';
    }

    public function status($request)
    {
        $data = User::find($request->id);

        if(!$data)
        {
            return 'error';
        }

        $data->update(['status'=>$request->status]);
        return 'done';
    }
}
