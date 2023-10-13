<?php

namespace App\Http\Controllers\Hospital\Login;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\LoginRepositoryInterface;
use App\Http\Requests\Hospital\Login\LoginRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private $repository;

    public function __construct(LoginRepositoryInterface $loginRepository)
    {
        $this->repository = $loginRepository;
        /*$this->middleware('permission:عرض-محاسب',['only'=>['index','show','status']]);
        $this->middleware('permission:أضافة-محاسب',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-محاسب',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-محاسب',['only'=>['delete','multi_delete']]);*/
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function login(LoginRequest $request)
    {
        return $this->repository->login($request);
    }

    public function logout()
    {
        return $this->repository->logout();
    }
}
