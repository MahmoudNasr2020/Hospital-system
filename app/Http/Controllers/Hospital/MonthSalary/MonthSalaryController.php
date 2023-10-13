<?php

namespace App\Http\Controllers\Hospital\MonthSalary;

use App\DataTables\Month_salaryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\MonthSalaryRepositoryInterface;
use App\Http\Requests\Hospital\MonthSalary\MonthSalaryRequest;
use App\Models\MonthSalary;
use Illuminate\Http\Request;

class MonthSalaryController extends Controller
{
    private $repository;

    public function __construct(MonthSalaryRepositoryInterface $monthSalaryRepository)
    {
        $this->repository = $monthSalaryRepository;
         $this->middleware('permission:عرض-شهور-صرف-الرواتب',['only'=>['index','show']]);
         $this->middleware('permission:اضافة-شهور-صرف-الرواتب',['only'=>['create','store']]);
         $this->middleware('permission:تعديل-شهور-صرف-الرواتب',['only'=>['edit','update']]);
         $this->middleware('permission:حذف-شهور-صرف-الرواتب',['only'=>['delete','multi_delete']]);
    }

    public function index(Month_salaryDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }


    public function store(MonthSalaryRequest $request)
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

    public function update(MonthSalaryRequest $request)
    {
        return $this->repository->update($request);
    }

    public function delete($id)
    {
        return $this->repository->delete(MonthSalary::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(MonthSalary::class,$request->data);
    }
}
