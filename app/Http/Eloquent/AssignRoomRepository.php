<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\AssignRoomRepositoryInterface;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class AssignRoomRepository implements AssignRoomRepositoryInterface
{
    public function index($dataTable)
    {
        $patients = Patient::all();
        $rooms = Room::all();
        return $dataTable->render('Hospital.pages.assign_rooms.index',compact('patients','rooms'));
    }


    public function store($request)
    {

        $patient = Patient::find($request->patient);
        $room = Room::find($request->room);
        $rooms = Patient::where('room_id',$request->room)->get();
        $rooms_count = count($rooms);
        $available_beds = $room->beds - $rooms_count;
        if(!$patient || !$room)
        {
            return 'notFound';
        }
        if ($patient->room_id != null)
        {
            return 'exists';
        }

        if ($available_beds <= 0)
        {
            return 'not_available';
        }

        $store = $patient->update([
            'room_id'=>$request->room,
            'room_added'=>Auth::user()->id,
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
        $data = Patient::with('room')->select('id','name','identify_no','room_id')->find($id);

        if(!$data)
        {
            return 'error';
        }
        return $data;
    }

    /** @noinspection DuplicatedCode */
    public function update($request)
    {
        $patient = Patient::find($request->patient);
        $room = Room::find($request->room);
        $rooms = Patient::where('room_id',$request->room)->where('id','!=',$request->patient)->get();
        $rooms_count = count($rooms);
        $available_beds = $room->beds - $rooms_count;
        if(!$patient || !$room)
        {
            return 'notFound';
        }

        if ($available_beds <= 0)
        {
            return 'not_available';
        }

        //if request has image
        $update = $patient->update([
            'room_id'=>$request->room,
            'room_added'=>Auth::user()->id,
        ]);
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
        $data->update(['room_id'=>null]);
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        $model::whereIn('id',$data)->update(['room_id'=>null]);
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function show_rooms()
    {
        $rooms = Room::withCount('patients')->with('department')->get();
        if(!$rooms)
        {
            return 'error';
        }
        return $rooms;

    }
}
