<?php


namespace App\Http\Interfaces;


interface AdminRepositoryInterface
{
    public function index($dataTable);
    public function create();
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request,$id);
    public function delete($model,$item);
    public function multi_delete($model,array $data);
    public function status($request);
}
