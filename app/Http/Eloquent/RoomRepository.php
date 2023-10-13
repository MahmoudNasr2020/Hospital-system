<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\RoomRepositoryInterface;
use App\Models\Department;
use App\Models\Room;

class RoomRepository implements RoomRepositoryInterface
{
    public function index($dataTable)
    {
        $departments = Department::all();
        return $dataTable->render('Hospital.pages.rooms.index',['departments'=>$departments]);
    }


    public function store($request)
    {

        $store = Room::create([
            'department_id'=>$request->department_id,
            'room_number'=>$request->room_number,
            'beds' => $request->beds,
        ]);
        if(!$store)
        {
            return 'error';
        }
        return 'done';
    }

    public function show($id)
    {
        $data = Room::find($id);

        if(!$data)
        {
            return 'error';
        }
        return $data;
    }
    public function edit($id)
    {
        $data = Room::find($id);

        if(!$data)
        {
            return 'error';
        }
        return $data;
    }

    public function update($request)
    {
        $data = Room::find($request->id);
        if(!$data)
        {
            return 'error';
        }
        //if request has image
        $update = $data->update($request->except('id'));
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }
    public function delete($model,$id)
    {
        $data = $model::find($id);
        if(!$data)
        {
            return 'error';
        }
        $data->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        $model::whereIn('id',$data)->delete();
        return 'done';
    }
}
