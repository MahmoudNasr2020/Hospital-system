<?php


namespace App\Http\Interfaces;


interface SalaryRepositoryInterface
{
    public function index($id);
    public function search($request);
    public function pay($request);
    public function cashing($request);
    public function delete_pay($request);
}
