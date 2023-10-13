<?php


namespace App\Http\Interfaces;


interface RoomRepositoryInterface
{
    public function index($dataTable);
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request);
    public function delete($model,$item);
    public function multi_delete($model,array $data);
}
