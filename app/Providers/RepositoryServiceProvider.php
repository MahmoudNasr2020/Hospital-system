<?php

namespace App\Providers;

use App\Http\Eloquent\AccountantRepository;
use App\Http\Eloquent\AdminRepoistory;
use App\Http\Eloquent\AssignRoomRepository;
use App\Http\Eloquent\AttendanceRepository;
use App\Http\Eloquent\DoctorRepository;
use App\Http\Eloquent\GlobalRepository;
use App\Http\Eloquent\InvoiceRepository;
use App\Http\Eloquent\LaborerRepository;
use App\Http\Eloquent\LoginRepository;
use App\Http\Eloquent\MessageRepository;
use App\Http\Eloquent\MonthSalaryRepository;
use App\Http\Eloquent\NurseRepository;
use App\Http\Eloquent\PatientRepository;
use App\Http\Eloquent\ReceptionistRepository;
use App\Http\Eloquent\ReportRepository;
use App\Http\Eloquent\RoleRepoitory;
use App\Http\Eloquent\RoomRepository;
use App\Http\Eloquent\SalaryRepository;
use App\Http\Interfaces\AccountantRepositoryInterface;
use App\Http\Interfaces\AdminRepositoryInterface;
use App\Http\Interfaces\AssignRoomRepositoryInterface;
use App\Http\Interfaces\AttendanceRepositoryInterface;
use App\Http\Interfaces\DoctorRepositoryInterface;
use App\Http\Interfaces\GlobalRepositoryInterface;
use App\Http\Interfaces\InvoiceRepositoryInterface;
use App\Http\Interfaces\LaborerRepositoryInterface;
use App\Http\Interfaces\LoginRepositoryInterface;
use App\Http\Interfaces\MessageRepositoryInterface;
use App\Http\Interfaces\MonthSalaryRepositoryInterface;
use App\Http\Interfaces\NurseRepositoryInterface;
use App\Http\Interfaces\PatientRepositoryInterface;
use App\Http\Interfaces\ReceptionistRepositoryInterface;
use App\Http\Interfaces\ReportRepositoryInterface;
use App\Http\Interfaces\RoleRepoitoryInterface;
use App\Http\Interfaces\RoomRepositoryInterface;
use App\Http\Interfaces\SalaryRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->app->bind(GlobalRepositoryInterface::class,GlobalRepository::class);
        $this->app->bind(DoctorRepositoryInterface::class,DoctorRepository::class);
        $this->app->bind(NurseRepositoryInterface::class,NurseRepository::class);
        $this->app->bind(LaborerRepositoryInterface::class,LaborerRepository::class);
        $this->app->bind(AccountantRepositoryInterface::class,AccountantRepository::class);
        $this->app->bind(ReceptionistRepositoryInterface::class,ReceptionistRepository::class);
        $this->app->bind(RoleRepoitoryInterface::class,RoleRepoitory::class);
        $this->app->bind(LoginRepositoryInterface::class,LoginRepository::class);
        $this->app->bind(AdminRepositoryInterface::class,AdminRepoistory::class);
        $this->app->bind(PatientRepositoryInterface::class,PatientRepository::class);
        $this->app->bind(RoomRepositoryInterface::class,RoomRepository::class);
        $this->app->bind(AssignRoomRepositoryInterface::class,AssignRoomRepository::class);
        $this->app->bind(ReportRepositoryInterface::class,ReportRepository::class);
        $this->app->bind(InvoiceRepositoryInterface::class,InvoiceRepository::class);
        $this->app->bind(MonthSalaryRepositoryInterface::class,MonthSalaryRepository::class);
        $this->app->bind(SalaryRepositoryInterface::class,SalaryRepository::class);
        $this->app->bind(AttendanceRepositoryInterface::class,AttendanceRepository::class);
        $this->app->bind(MessageRepositoryInterface::class,MessageRepository::class);
    }

    public function boot()
    {
        //
    }
}
