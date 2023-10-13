<?php

namespace App\Http\Controllers\Hospital\Attendance;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttendanceRepositoryInterface;
use App\Http\Interfaces\SalaryRepositoryInterface;
use App\Http\Requests\Hospital\Salary\CacheRequest;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    private $repository;

    public function __construct(AttendanceRepositoryInterface $attendanceRepository)
    {
        $this->repository = $attendanceRepository;
        $this->middleware('permission:تسجيل-الحضور',['only'=>['index', 'search', 'assign_attendence']]);
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function search(Request $request)
    {
        return $this->repository->search($request);
    }

    public function assign_attendence(Request $request)
    {
        return $this->repository->assign_attendence($request);
    }


}
