<?php

namespace App\Http\Controllers\Hospital\Message;

use App\Http\Controllers\Controller;
use App\Http\Interfaces\AttendanceRepositoryInterface;
use App\Http\Interfaces\MessageRepositoryInterface;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    private $repository;

    public function __construct(MessageRepositoryInterface $messageRepository)
    {
        $this->repository = $messageRepository;
        /* $this->middleware('permission:عرض-محاسب',['only'=>['index','show','status']]);
         $this->middleware('permission:اضافة-محاسب',['only'=>['create','store']]);
         $this->middleware('permission:تعديل-محاسب',['only'=>['edit','update']]);
         $this->middleware('permission:حذف-محاسب',['only'=>['delete','multi_delete']]);*/
    }

    public function index()
    {
        return $this->repository->index();
    }

    public function search(Request $request)
    {
        return $this->repository->search($request);
    }

    public function send(Request $request)
    {
        return $this->repository->send($request);
    }
}
