<?php

namespace App\Http\Controllers\Hospital\Laborer;

use App\DataTables\LaborerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\LaborerRepositoryInterface;
use App\Http\Requests\Hospital\Laborer\AddLaborerRequest;
use App\Http\Requests\Hospital\Laborer\UpdateAccountantRequest;
use App\Http\Requests\Hospital\Laborer\UpdateLaborerRequest;
use App\Models\Laborer;
use Illuminate\Http\Request;

class LaborerController extends Controller
{
    private $repository;

    public function __construct(LaborerRepositoryInterface $laborerRepository)
    {
        $this->repository = $laborerRepository;
        $this->middleware('permission:عرض-عامل',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-عامل',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-عامل',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-عامل',['only'=>['delete','multi_delete']]);
    }
    public function index(LaborerDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddLaborerRequest $request)
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

    public function update(UpdateLaborerRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Laborer::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Laborer::class,$request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }

    /*


       $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));

        return redirect()->route('roles.index')
                        ->with('success','Role created successfully');

{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permission:</strong>
            <br/>
            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                {{ $value->name }}</label>
            <br/>
            @endforeach
        </div>
    </div>
    */
}
