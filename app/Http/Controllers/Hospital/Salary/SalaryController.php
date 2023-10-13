<?php

namespace App\Http\Controllers\Hospital\Salary;

use App\DataTables\SalaryDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\SalaryRepositoryInterface;
use App\Http\Requests\Hospital\Salary\CacheRequest;
use App\Http\Requests\Hospital\Salary\SearchRequest;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    private $repository;

    public function __construct(SalaryRepositoryInterface $salaryRepository)
    {
        $this->repository = $salaryRepository;
        $this->middleware('permission:صرف-الرواتب',['only'=>['index','search','pay','cashing','delete_pay']]);
    }

    public function index($id)
    {
        return $this->repository->index($id);
    }

    public function search(Request $request)
    {
        return $this->repository->search($request);
    }

    public function pay(Request $request)
    {
        return $this->repository->pay($request);
    }

    public function cashing(CacheRequest $request)
    {
        return $this->repository->cashing($request);
    }


    public function delete_pay(Request $request)
    {
        return $this->repository->delete_pay($request);
    }

}
