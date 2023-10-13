<?php


namespace App\Http\Interfaces;


interface MessageRepositoryInterface
{
    public function index();
    public function search($request);
    public function send($request);

}
