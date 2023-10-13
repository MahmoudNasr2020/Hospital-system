<?php

namespace App\Http\Controllers\Hospital\Receptionist;

use App\DataTables\ReceptionistDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\ReceptionistRepositoryInterface;
use App\Http\Requests\Hospital\Receptionist\AddReceptionistRequest;
use App\Http\Requests\Hospital\Receptionist\UpdateReceptionistRequest;
use App\Models\Accountant;
use App\Models\Receptionist;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    private $repository;

    public function __construct(ReceptionistRepositoryInterface $receptionistRepository)
    {
        $this->repository = $receptionistRepository;
        $this->middleware('permission:عرض-موظف-استقبال',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-موظف-استقبال',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-موظف-استقبال',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-موظف-استقبال',['only'=>['delete','multi_delete']]);
    }

    public function index(ReceptionistDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }

    public function create()
    {
        return $this->repository->create();
    }

    public function store(AddReceptionistRequest $request)
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

    public function update(UpdateReceptionistRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Receptionist::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Receptionist::class,$request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
