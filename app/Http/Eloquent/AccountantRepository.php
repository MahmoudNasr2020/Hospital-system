<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\AccountantRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Accountant;
use App\Models\Laborer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AccountantRepository implements AccountantRepositoryInterface
{
    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.accountants.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('Hospital.pages.accountants.components.include.add',compact('roles'));
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload('accountants',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        DB::beginTransaction();
        $request->request->add(['user_type'=>'accountant']);
        $request->merge(['password'=>Hash::make($request->password)]);
        $user = User::create($request->only(['name','user_name','user_type','password','status','photo']));
        $roles = $user->assignRole($request->roles);
        $request->request->add(['user_id'=>$user->id]);
        $member = Accountant::create($request->except(['name','user_name','password','password_confirmation','photo']));

        if (!$user || !$member || !$roles)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }

    public function show($id)
    {
        $data = Accountant::with('user')->findOrFail($id);
        return view('Hospital.pages.accountants.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = Accountant::with('user')->findOrFail($data);
        $roles = Role::get();
        $data_roles = $data->user->roles->pluck('name')->toArray();
        return view('Hospital.pages.accountants.components.include.edit',compact('data','roles','data_roles'));
    }

    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     * @param $request
     * @param $id
     * @return string
     */
    public function update($request,$id)
    {
        $data = Accountant::find($id);

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
            $this->deleteImage('Hospital/Images/'.$data->user->photo);
            $image = $this->imageUpload('accountants',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        DB::beginTransaction();
        $user = $data->user->update($request->only(['name','user_name','password','photo']));
        DB::table('model_has_roles')->where('model_id',$data->user->id)->delete();
        $roles = $data->user->assignRole($request->roles);
        $member = $data->update($request->except(['name','user_name','password','password_confirmation','photo']));

        if (!$user || !$member || !$roles)
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
        $this->deleteImage('Hospital/Images/accountants/'.$item->photo);
        DB::table('model_has_roles')->where('model_id',$item->id)->delete();
        $item->user()->delete();
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        foreach ($data as $item)
        {
            $item = $model::findOrFail($item);
            $this->deleteImage('Hospital/Images/accountants/'.$item->photo);
            DB::table('model_has_roles')->where('model_id',$item->id)->delete();
            $item->user->delete();
            $item->delete();
        }
        return 'done';
    }

    public function status($request)
    {
        $data = Accountant::find($request->id);

        if(!$data)
        {
            return 'error';
        }

        $data->user->update(['status'=>$request->status]);
        return 'done';
    }
}
