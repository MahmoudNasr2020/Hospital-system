<?php

namespace App\Http\Controllers\Hospital\Report;

use App\DataTables\PatientDataTable;
use App\DataTables\PatientReportDataTable;
use App\DataTables\ReportDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\ReportRepositoryInterface;
use App\Http\Requests\Hospital\Report\AddReportRequest;
use App\Http\Requests\Hospital\Report\ReportRequest;
use App\Http\Requests\Hospital\Report\UpdateReportRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $repository;
    public function __construct(ReportRepositoryInterface $repository)
    {
        $this->repository = $repository;
        $this->middleware('permission:عرض-تقرير-المريض',['only'=>['index','show','indexPatient']]);
        $this->middleware('permission:اضافة-تقرير-المريض',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-تقرير-المريض',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-تقرير-المريض',['only'=>['delete','multi_delete']]);
    }

    /** @noinspection PhpUnused */
    public function indexPatient(PatientReportDataTable $dataTable)
    {
        return $this->repository->indexPatient($dataTable);
    }

    public function index(ReportDataTable $dataTable,$id)
    {
        return $this->repository->index($dataTable,$id);
    }
    public function create($id)
    {
        return $this->repository->create($id);
    }
    public function store(AddReportRequest $request)
    {
        return $this->repository->store($request);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function update(UpdateReportRequest $request)
    {
        return $this->repository->update($request);
    }

    public function delete($id)
    {
        return $this->repository->delete(Doctor::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Doctor::class,$request->data);
    }

}
