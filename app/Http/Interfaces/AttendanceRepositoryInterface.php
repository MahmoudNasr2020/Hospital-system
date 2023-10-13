<?php


namespace App\Http\Interfaces;


interface AttendanceRepositoryInterface
{
    public function index();
    public function search($request);
    public function assign_attendence($request);
}
