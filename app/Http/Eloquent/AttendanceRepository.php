<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\AttendanceRepositoryInterface;
use App\Http\Requests\System\Student\assign_student_attendenceRequest;
use App\Models\Attendance;
use App\Models\MonthSalary;
use App\Models\Salary;
use App\Models\Student_Attendance;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class AttendanceRepository implements AttendanceRepositoryInterface
{

    public function index()
    {
        return view('Hospital.pages.attendances.index');
    }

    public function search($request)
    {
        $user = $request->user;
        $user = ucfirst($user);
        $model = '\App\Models\\';
        $model .= $user;

        $data = $model::select('id','identify_no','user_id')->with('user:id,name,user_type')->get();
        foreach($data as $item)
        {
            $attendance = Attendance::where('user_id',$item->user->id)->where('date','=',$request->date)->first();
            if($attendance)
            {
                $item->attendance = $attendance->attendance;
                $item->attendance_note = $attendance->note;
            }
        }
        if($request->has('datatable'))
        {
            return DataTables::of($data)
                ->addColumn('name',function($row){
                    return $row->user->name;
                })
                ->addColumn('identify_no',function($row){
                    return $row->identify_no;
                })

                ->addColumn('added_by',function($data) use ($request){

                    $attendance = Attendance::where(['date'=>$request->date,'user_id'=>$data->user->id])->first();

                    if($attendance)
                    {
                        if($attendance->addedBy != null)
                        {
                            if($attendance->addedBy->user_type == 'admin')
                            {
                                return '<a href="'.route('hospital.admin.show',['id'=>$attendance->added_by,'name'=> str_replace(' ','_',$attendance->addedBy->name)]).'"
                                style="margin-right: -15px;" target="_blank">'.$attendance->addedBy->name.'</a>';
                            }

                            else
                            {
                                $user = $attendance->addedBy->user_type;
                                $user = ucfirst($user);
                                $model = '\App\Models\\';
                                $model .= $user;
                                $user = $model::where('user_id',$attendance->addedBy->id)->first();
                                return '<a href="'.route('hospital.'.$attendance->addedBy->user_type.'.show',['id'=>$user->id,'name'=> str_replace(' ','_',$user->name)]).'"
                                style="margin-right: -15px;" target="_blank">'.$user->name.'</a>';
                            }
                        }

                        else
                        {
                            return 'غير مسجل';
                        }
                    }
                    else
                    {
                        return 'غير مسجل';
                    }


                })

                ->addColumn('attendance',function($row){

                    $present = $row->attendance == 'حاضر' ?'checked' :'';
                    $late = $row->attendance == 'متاخر' ?'checked' :'';
                    $half_day = $row->attendance == 'نصف_يوم' ?'checked' :'';
                    $absent = $row->attendance == 'غائب' ?'checked' :'';
                    $attendance = '
                                    <ul class="list-unstyled mb-0" style="white-space: nowrap;margin-top: -0.75em;">
                                            <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-success">
                                                        <input type="radio" name="attendance_date'.$row->user->id.'" class="radio_attendance" id="colorRadio3'.$row->user->id.'" '.$present.' data-id='.$row->user->id.' data-attendance="حاضر">
                                                        <label for="colorRadio3'.$row->user->id.'" style="font-size:13px">حاضر</label>
                                                    </div>
                                                </fieldset>
                                              </li>
                                              <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-primary">
                                                        <input type="radio" name="attendance_date'.$row->user->id.'" class="radio_attendance" id="colorRadio4'.$row->user->id.'" '. $late.' data-id='.$row->user->id.' data-attendance="متاخر">
                                                        <label for="colorRadio4'.$row->user->id.'" style="font-size:13px">متاخر</label>
                                                    </div>
                                                </fieldset>
                                              </li>
                                              <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-warning">
                                                        <input type="radio" name="attendance_date'.$row->user->id.'" class="radio_attendance" id="colorRadio5'.$row->user->id.'" '.$half_day.' data-id='.$row->user->id.' data-attendance="نصف_يوم">
                                                        <label for="colorRadio5'.$row->user->id.'" style="font-size:13px">نصف يوم</label>
                                                    </div>
                                                </fieldset>
                                              </li>
                                              <li class="d-inline-block mr-2 mb-1">
                                                <fieldset>
                                                    <div class="radio radio-danger">
                                                        <input type="radio" name="attendance_date'.$row->user->id.'" class="radio_attendance" id="colorRadio6'.$row->user->id.'" '.$absent.' data-id='.$row->user->id.' data-attendance="غائب">
                                                        <label for="colorRadio6'.$row->user->id.'" style="font-size:13px">غائب</label>
                                                    </div>
                                                </fieldset>
                                              </li>';
                    return $attendance;

                })

                ->addColumn('note',function($row){
                    $note = $row->attendance_note != '' ? $row->attendance_note : '';
                    return '<textarea type="text" class="form-control note" name="attendance_note" autocomplete="off" value='.$note.'>'.$note.'</textarea>';
                })

                ->addIndexColumn()
                ->rawColumns(['name','identify_no','added_by','attendance','note'])
                ->make(true);
        }
        else
        {
            return $data;
        }

    }

    public function assign_attendence($request)
    {
        //return $request;
        $attendance_date =$request->attendance_date;
        foreach($request->data as $item)
        {
            Attendance::updateOrCreate(
                ['user_id'=>$item['id'],'date'=>$attendance_date],
                ['note'=>$item['note'],
                    'added_by'=>Auth::user()->id,
                    'attendance'=>$item['attendance']]
            );
        }
        return 'done';
    }

}
