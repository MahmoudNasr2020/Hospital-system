<?php

namespace App\Http\Controllers\Hospital\Account;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Salary;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:عرض-البروفايل',['only'=>['index']]);
    }
    public function index($id)
    {
        $data = User::findOrFail($id);
        $attendances = Attendance::where('user_id',$id)->get();
        $salaries = Salary::where('user_id',Auth::user()->id)->with('month:id,month,year,date')->get();
        foreach ($salaries as $salary)
        {
            $salary->date = date('Y-m',strtotime($salary->month->date));
        }
        return view('Hospital.pages.account.index',compact('data','attendances','salaries'));
    }
}
