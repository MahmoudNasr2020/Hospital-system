<?php

namespace App\Http\Interfaces;

interface GlobalRepositoryInterface
{
    public function index($class,$pageTable,$pageNormal,$data);
    public function create($class,$view,$data);
    public function show($class,$view,$model,$id);
    public function store($class,$model,$request,$image);
    public function edit($class,$view,$model,$id);
    public function update($class,$model,$request);
    public function delete($class,$model,$id);
    public function multi_delete($class,$model,array $data);
}

