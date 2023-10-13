<?php

namespace App\Http\Controllers\Hospital\Accountant;

use App\DataTables\AccountantDataTable;
use App\DataTables\LaborerDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\AccountantRepositoryInterface;
use App\Http\Interfaces\LaborerRepositoryInterface;
use App\Http\Requests\Hospital\Accountant\AddAccountantRequest;
use App\Http\Requests\Hospital\Accountant\AddAdminRequest;
use App\Http\Requests\Hospital\Accountant\UpdateAccountantRequest;
use App\Http\Requests\Hospital\Accountant\UpdateAdminRequest;
use App\Http\Requests\Hospital\Accountant\UpdateReceptionistRequest;
use App\Http\Requests\Hospital\Laborer\AddLaborerRequest;
use App\Models\Accountant;
use App\Models\Laborer;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    private $repository;

    public function __construct(AccountantRepositoryInterface $accountantRepository)
    {
        $this->repository = $accountantRepository;
        $this->middleware('permission:عرض-محاسب',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-محاسب',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-محاسب',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-محاسب',['only'=>['delete','multi_delete']]);
    }

    public function index(AccountantDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddAccountantRequest $request)
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

    public function update(UpdateAccountantRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Accountant::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Accountant::class,$request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
