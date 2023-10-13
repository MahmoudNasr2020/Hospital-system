<?php

namespace App\Http\Controllers\Hospital\Room;

use App\DataTables\RoomDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\RoomRepositoryInterface;
use App\Http\Requests\Hospital\Room\RoomRequest;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    private $repository;

    public function __construct(RoomRepositoryInterface $roomRepository)
    {
        $this->repository = $roomRepository;
        $this->middleware('permission:عرض-غرف-المستشفي',['only'=>['index','show']]);
        $this->middleware('permission:اضافة-غرف-المستشفي',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-غرف-المستشفي',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-غرف-المستشفي',['only'=>['delete','multi_delete']]);
    }

    public function index(RoomDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }


    public function store(RoomRequest $request)
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

    public function update(RoomRequest $request)
    {
        return $this->repository->update($request);
    }

    public function delete($id)
    {
        return $this->repository->delete(Room::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Room::class,$request->data);
    }

}
