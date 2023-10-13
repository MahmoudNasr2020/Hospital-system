<?php

namespace App\Http\Controllers\Hospital\Patient;

use App\DataTables\PatientDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\PatientRepositoryInterface;
use App\Http\Requests\Hospital\Patient\AddPatientRequest;
use App\Http\Requests\Hospital\Patient\UpdatePatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private $repository;
    public function __construct(PatientRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('permission:عرض-مريض',['only'=>['index','show']]);
        $this->middleware('permission:اضافة-مريض',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-مريض',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-مريض',['only'=>['delete','multi_delete']]);
    }
    public function index(PatientDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddPatientRequest $request)
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

    public function update(UpdatePatientRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Patient::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Patient::class,$request->data);
    }

}
