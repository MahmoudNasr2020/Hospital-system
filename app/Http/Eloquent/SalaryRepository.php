<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\SalaryRepositoryInterface;
use App\Models\MonthSalary;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Yajra\DataTables\Facades\DataTables;

class SalaryRepository implements SalaryRepositoryInterface
{

    public function index($id)
    {
        $month = MonthSalary::findOrFail($id);
        return view('Hospital.pages.salaries.index',['month'=>$month]);
    }

    public function search($request)
    {
        $user = $request->data;
        $user = ucfirst($user);
        $model = '\App\Models\\';
        $model .= $user;

        $data = $model::with('user')->get(); //to get all section in this grade and classroom
        if($request->has('datatable'))
        {
            return DataTables::of($data)
                ->addColumn('name',function($row){
                    return $row->user->name;
                })
                ->addColumn('identify_no',function($row){
                    return $row->identify_no;
                })
                ->addColumn('salary',function($row){
                    return '<p class="pay_parg" style="font-size: 14px">'.$row->salary.' جنيه '.'</p>';
                })

                ->addColumn('total_paid',function($row) use ($request){
                    $total_paid = Salary::where(['month_id'=>$request->month,'user_id'=>$row->user->id])->first();
                    $total_paid = $total_paid != '' ? $total_paid->salary_paid : 0;
                    return $total_paid .' جنيه ';
                })

                ->addColumn('incentives',function($row) use ($request){
                    $incentives = Salary::where(['month_id'=>$request->month,'user_id'=>$row->user->id])->first();
                    $incentives = $incentives != '' ? $incentives->incentives : 0;
                    return $incentives .' جنيه ';
                })
                ->addColumn('discounts',function($row) use ($request){
                    $discounts = Salary::where(['month_id'=>$request->month,'user_id'=>$row->user->id])->first();
                    $discounts = $discounts != '' ? $discounts->discounts : 0;
                    return $discounts .' جنيه ';
                })
                ->addColumn('added_by',function($data) use ($request){

                    $salary = Salary::where(['month_id'=>$request->month,'user_id'=>$data->user->id])->first();

                    if($salary)
                    {
                        if($salary->addedBy != null)
                        {
                            if($salary->addedBy->user_type == 'admin')
                            {
                                return '<a href="'.route('hospital.admin.show',['id'=>$salary->added_by,'name'=> str_replace(' ','_',$salary->addedBy->name)]).'"
                                style="margin-right: -15px;" target="_blank">'.$salary->addedBy->name.'</a>';
                            }

                            else
                            {
                                $user = $salary->addedBy->user_type;
                                $user = ucfirst($user);
                                $model = '\App\Models\\';
                                $model .= $user;
                                $user = $model::where('user_id',$salary->addedBy->id)->first();
                                return '<a href="'.route('hospital.'.$salary->addedBy->user_type.'.show',['id'=>$user->id,'name'=> str_replace(' ','_',$user->name)]).'"
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

                ->addColumn('status',function($data) use ($request){
                    $salary = Salary::where(['month_id'=>$request->month,'user_id'=>$data->user->id])->first();

                    if($salary)
                    {
                        return '<button class="btn btn-success" style="font-size: 14px;margin-right: -16px;white-space: nowrap;">مصروف</button>';
                    }
                    else
                    {
                        return '<button class="btn btn-danger" style="font-size: 14px;margin-right: -16px;white-space: nowrap;">غير مصروف</button>';
                    }
                })

                ->addColumn('action',function($data) use ($request){
                    $salary = Salary::where(['month_id'=>$request->month,'user_id'=>$data->user->id])->first();
                    $user_type = $data->user->user_type;
                    $user = ucfirst($user_type);
                    $model = '\App\Models\\';
                    $model .= $user;
                    $user = $model::where('user_id',$data->user->id)->first();

                    $return = '<a>
                      <i title="صرف"
                                class="fa fa-comment-dollar pay" data-month="'.$request->month.'"  data-user="'.$data->user->id.'"
                                data-route="'.route('hospital.salary.pay').'"
                                style="cursor: pointer;color:green;font-size:17px"></i></a>';
                    if($salary)
                    {
                        $return.= '<a>
                                        <i title="الغاء الصرف"
                                        class="fa fa-comment-dollar delete_pay" data-month="'.Crypt::encryptString($request->month).'"  data-user="'.Crypt::encryptString($data->user->id).'"
                                        data-route="'.route('hospital.salary.delete_pay').'"
                                        style="cursor: pointer;color:red;font-size:17px"></i>
                                    </a>';
                    }
                    $return .= '<a href="'.route('hospital.'.$user_type.'.show',['id'=>$user->id,'name'=>str_replace(' ','_',$user->name)]).'" target="_blank">
                             <i title="عرض" class="fa fa-eye showing"
                            data-id="'.$data->id.'" style="cursor: pointer;color:blue;font-size:17px"></i>
                        </a>';
                    return $return;
                })

                ->addIndexColumn()
                ->rawColumns(['name','identify_no','salary','total_paid','incentives','discounts','added_by','status','action'])
                ->make(true);
        }
        else
        {
            return $data;
        }

    }

    public function pay($request)
    {
        $salary = Salary::where(['month_id'=>$request->month,'user_id'=>$request->user])->first();
        if(!$salary)
        {
            return ['status'=>'not_found','month_id'=>$request->month,'user_id'=>Crypt::encryptString($request->user)];
        }
        $salary->user_id = Crypt::encryptString($salary->user_id);
        return $salary;
    }

    public function cashing($request)
    {
        $id = Crypt::decryptString($request->user_id);
        $data = User::find($id);
        if(!$data)
        {
            return 'error';
        }
        $user = $data->user_type;
        $user = ucfirst($user);
        $model = '\App\Models\\';
        $model .= $user;
        $user = $model::select('salary')->where('user_id',$data->id)->first();
        $incentives = $request->incentives == '' ? 0 : $request->incentives;
        $discounts = $request->discounts == '' ? 0 : $request->discounts;
        $salary_paid = $user->salary + $incentives - $discounts;
        $paid = Salary::updateOrCreate(
            ['month_id'=>$request->month_id,
            'user_id'=>$data->id ],
            ['salary_paid' => $salary_paid,
            'incentives' => $incentives,
            'discounts' => $discounts,
            'added_by' => Auth::user()->id,
        ]);
        if(!$paid)
        {
            return 'error';
        }
        return 'done';
    }

    public function delete_pay($request)
    {
        $user = Crypt::decryptString($request->user);
        $month = Crypt::decryptString($request->month);
        $data = Salary::where(['user_id'=>$user,'month_id'=>$month])->first();
        if(!$data)
        {
            return 'error';
        }
        $data->delete();
        return 'done';
    }
}
