<?php

namespace App\Http\Controllers\Hospital\Doctor;

use App\DataTables\DoctorDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\DoctorRepositoryInterface;
use App\Http\Requests\Hospital\Doctor\AddDoctorRequest;
use App\Http\Requests\Hospital\Doctor\UpdateDoctorRequest;
use App\Http\Requests\Hospital\Doctor\UpdatePatientRequest;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    private $repository;
    public function __construct(DoctorRepositoryInterface $repository)
    {
       $this->repository = $repository;
       $this->middleware('permission:عرض-دكتور',['only'=>['index','show','status']]);
       $this->middleware('permission:اضافة-دكتور',['only'=>['create','store']]);
       $this->middleware('permission:تعديل-دكتور',['only'=>['edit','update']]);
       $this->middleware('permission:حذف-دكتور',['only'=>['delete','multi_delete']]);
    }
    public function index(DoctorDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddDoctorRequest $request)
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

    public function update(UpdateDoctorRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Doctor::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Doctor::class,$request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
