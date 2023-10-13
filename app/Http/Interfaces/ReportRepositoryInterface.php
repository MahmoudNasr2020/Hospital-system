<?php


namespace App\Http\Interfaces;


interface ReportRepositoryInterface
{
    public function indexPatient($dataTable);
    public function index($dataTable,$id);
    public function create($id);
    public function store($request);
    public function show($id);
    public function edit($id);
    public function update($request);
    public function delete($model,$item);
    public function multi_delete($model,array $data);
}
