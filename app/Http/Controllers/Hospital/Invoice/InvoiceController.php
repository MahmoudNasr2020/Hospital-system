<?php

namespace App\Http\Controllers\Hospital\Invoice;

use App\DataTables\InvoiceDataTable;
use App\DataTables\PatientInvoiceDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\InvoiceRepositoryInterface;
use App\Http\Requests\Hospital\Invoice\AddInvoiceRequest;
use App\Http\Requests\Hospital\Invoice\PayInvoiceRequest;
use App\Http\Requests\Hospital\Invoice\UpdateInvoiceRequest;
use App\Http\services\Paymob;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    private $repository;
    public function __construct(InvoiceRepositoryInterface $invoiceRepository)
    {
        $this->repository = $invoiceRepository;
        $this->middleware('permission:عرض-فاتورة-المريض',['only'=>['index','show','indexPatient']]);
        $this->middleware('permission:اضافة-فاتورة-المريض',['only'=>['create','store','pay','payCache']]);
        $this->middleware('permission:تعديل-فاتورة-المريض',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-فاتورة-المريض',['only'=>['delete','multi_delete']]);
    }

    /** @noinspection PhpUnused */
    public function indexPatient(PatientInvoiceDataTable $dataTable)
    {
        return $this->repository->indexPatient($dataTable);
    }

    public function index(InvoiceDataTable $dataTable,$id)
    {
        return $this->repository->index($dataTable,$id);
    }
    public function create($id)
    {
        return $this->repository->create($id);
    }
    public function store(AddInvoiceRequest $request)
    {
        return $this->repository->store($request);
    }

    public function pay(Request $request)
    {
        return $this->repository->pay($request);
    }

    public function payCache(PayInvoiceRequest $request)
    {
        return $this->repository->payCache($request);
    }

    public function payOnline(PayInvoiceRequest $request,Paymob $paymob)
    {
        return $this->repository->payOnline($request,$paymob);
    }

    public function callback(Request $request,Paymob $paymob)
    {
        return $this->repository->callback($request,$paymob);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }


    public function edit(Request $request)
    {
        return $this->repository->edit($request);
    }

    public function update(UpdateInvoiceRequest $request)
    {
        return $this->repository->update($request);
    }

    public function delete($id)
    {
        return $this->repository->delete(Doctor::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Doctor::class,$request->data);
    }
}
