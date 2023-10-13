<?php

namespace App\Http\Controllers\Hospital\AssignRoom;

use App\DataTables\AssignRoomDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\AssignRoomRepositoryInterface;
use App\Http\Requests\Hospital\AssignRoom\AssignRoomRequest;
use App\Models\Patient;
use Illuminate\Http\Request;

class AssignRoomController extends Controller
{
    private $repository;

    public function __construct(AssignRoomRepositoryInterface $assignRoomRepository)
    {
        $this->repository = $assignRoomRepository;
         $this->middleware('permission:عرض-غرف-المرضي',['only'=>['index','show','show_rooms']]);
         $this->middleware('permission:اضافة-غرف-المرضي',['only'=>['store']]);
         $this->middleware('permission:تعديل-غرف-المرضي',['only'=>['edit','update']]);
         $this->middleware('permission:حذف-غرف-المرضي',['only'=>['delete','multi_delete']]);
    }

    public function index(AssignRoomDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }


    public function store(AssignRoomRequest $request)
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

    public function update(AssignRoomRequest $request)
    {
        return $this->repository->update($request);
    }

    public function delete($id)
    {
        return $this->repository->delete(Patient::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Patient::class,$request->data);
    }

    public function show_rooms()
    {
        return $this->repository->show_rooms();
    }

}
