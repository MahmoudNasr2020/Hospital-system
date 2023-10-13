<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\ReceptionistRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
class ReceptionistRepository implements ReceptionistRepositoryInterface
{
    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.receptionists.index');
    }

    public function create()
    {
        $roles = Role::all();
        return view('Hospital.pages.receptionists.components.include.add',compact('roles'));
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {
        if($request->hasFile('image'))
        {
            $image = $this->imageUpload('receptionists',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        DB::beginTransaction();
        $request->request->add(['user_type'=>'receptionist']);
        $request->merge(['password'=>Hash::make($request->password)]);
        $user = User::create($request->only(['name','user_name','password','user_type','status','photo']));
        $roles = $user->assignRole($request->roles);
        $request->request->add(['user_id'=>$user->id]);
        $member = Receptionist::create($request->except(['name','user_name','password','password_confirmation','photo']));

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
        $data = Receptionist::with('user')->findOrFail($id);
        return view('Hospital.pages.receptionists.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = Receptionist::with('user')->findOrFail($data);
        $roles = Role::get();
        $data_roles = $data->user->roles->pluck('name')->toArray();
        return view('Hospital.pages.receptionists.components.include.edit',compact('data','roles','data_roles'));
    }

    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     * @param $request
     * @param $id
     * @return string
     */
    public function update($request,$id)
    {
        $data = Receptionist::find($id);

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
            $this->deleteImage('Hospital/Images/receptionists/'.$data->photo);
            $image = $this->imageUpload('receptionists',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        DB::beginTransaction();
        $user = $data->user->update($request->only(['name','user_name','password']));
        DB::table('model_has_roles')->where('model_id',$data->user->id)->delete();
        $roles = $data->user->assignRole($request->roles);
        $member = $data->update($request->except(['name','user_name','password','password_confirmation','image']));

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
        $this->deleteImage('Hospital/Images/receptionists/'.$item->photo);
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
            $this->deleteImage('Hospital/Images/receptionists/'.$item->photo);
            DB::table('model_has_roles')->where('model_id',$item->id)->delete();
            $item->user->delete();
            $item->delete();
        }
        return 'done';
    }

    public function status($request)
    {
        $data = Receptionist::find($request->id);

        if(!$data)
        {
            return 'error';
        }

        $data->user->update(['status'=>$request->status]);
        return 'done';
    }
}
