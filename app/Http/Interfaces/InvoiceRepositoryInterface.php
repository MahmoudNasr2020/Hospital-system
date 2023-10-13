<?php


namespace App\Http\Interfaces;


interface InvoiceRepositoryInterface
{
    public function indexPatient($dataTable);
    public function index($dataTable,$id);
    public function create($id);
    public function store($request);
    public function pay($request);
    public function payCache($request);
    public function payOnline($request,$paymob);
    public function callback($request,$paymob);
    public function show($id);
    public function edit($request);
    public function update($request);
    public function delete($model,$item);
    public function multi_delete($model,array $data);
}
