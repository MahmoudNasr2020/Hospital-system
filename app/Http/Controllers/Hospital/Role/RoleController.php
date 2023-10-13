<?php

namespace App\Http\Controllers\Hospital\Role;

use App\DataTables\RoleDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\RoleRepoitoryInterface;
use App\Http\Requests\Hospital\Role\AddRoleRequest;
use App\Http\Requests\Hospital\Role\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $repository;

    public function __construct(RoleRepoitoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('permission:عرض-صلاحية',['only'=>['index','show']]);
        $this->middleware('permission:اضافة-صلاحية',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-صلاحية',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-صلاحية',['only'=>['delete','multi_delete']]);
    }
    public function index(RoleDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddRoleRequest $request)
    {
        return $this->repository->store($request);
    }
    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateRoleRequest $request,$id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Role::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Role::class,$request->data);
    }

}
