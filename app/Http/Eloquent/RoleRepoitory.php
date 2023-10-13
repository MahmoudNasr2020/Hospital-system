<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\RoleRepoitoryInterface;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepoitory implements RoleRepoitoryInterface
{

    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.roles.index');
    }


    /** @noinspection PhpUndefinedMethodInspection */
    public function create()
    {
          $permissions = Permission::get()->groupBy(function ($data){
            return trim( substr($data->name,strpos($data->name,'-')),'-');
        });

        return view('Hospital.pages.roles.components.include.add',compact('permissions'));
    }

    public function store($request)
    {
        DB::beginTransaction();
        $role = Role::create(['name'=>$request->name]);
        $permissions = $role->syncPermissions($request->permission);
        if (!$role || !$permissions)
        {
            DB::rollBack();
            return 'error';
        }
        DB::commit();
        return 'done';

    }

    public function show($id)
    {
        $role = Role::with('permissions')->findOrFail($id);
        return view('Hospital.pages.roles.components.include.show',compact('role'));
    }


    /** @noinspection PhpUndefinedMethodInspection */
    public function edit($data)
    {
         $role = Role::find($data);
        if(!$role)
        {
            return 'error';
        }
         $role_permissions = $role->permissions->pluck('id')->toArray();
         $permissions = Permission::get()->groupBy(function ($data){
             return trim( substr($data->name,strpos($data->name,'-')),'-');
         });;
         return view('Hospital.pages.roles.components.include.edit',compact('role','role_permissions','permissions'));
    }
    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     */
    public function update($request,$id)
    {
        $role = Role::find($id);
        if(!$role)
        {
            return 'error';
        }

        DB::beginTransaction();
        $role->update(['name'=>$request->name]);
        $permissions = $role->syncPermissions($request->permission);
        if (!$role || !$permissions)
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
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        $model::whereIn('id',$data)->delete();
        return 'done';
    }
}
