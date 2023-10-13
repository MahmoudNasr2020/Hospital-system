<?php


namespace App\Http\Interfaces;


interface LoginRepositoryInterface
{
    public function index();
    public function login($request);

    public function logout();
}
