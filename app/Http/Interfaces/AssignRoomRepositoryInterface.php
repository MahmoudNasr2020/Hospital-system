<?php


namespace App\Http\Interfaces;


interface AssignRoomRepositoryInterface
{
    public function index($dataTable);
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request);
    public function delete($model,$item);
    public function multi_delete($model,array $data);
    public function show_rooms();
}
