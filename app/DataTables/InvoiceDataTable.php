<?php

namespace App\DataTables;

use App\Models\Invoice;
use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class InvoiceDataTable extends DataTable
{

    public $patient_id;
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()

            ->addColumn('deserved_amount',function($data){
                return $data->total - $data->amount_paid;

            })

            ->addColumn('status',function($data){
                if($data->payment_status == 'مدفوع كلياً' )
                {
                    return '<button class="btn btn-success" style="font-size: 12px;margin-right: -16px;white-space: nowrap;">مدفوع كلياً</button>';
                }
                elseif ($data->payment_status == 'مدفوع جزئياً')
                {
                    return '<button class="btn btn-primary" style="font-size: 12px;margin-right: -16px;white-space: nowrap;">مدفوع جزئياً</button>';
                }
                else
                {
                    return '<button class="btn btn-danger" style="font-size: 12px;margin-right: -16px;white-space: nowrap;">غير مدفوع</button>';
                }
            })

            ->addColumn('action',function($data){
                return '
                  <i class="fa  fa-ellipsis-vertical" data-toggle="dropdown" style="cursor: pointer;font-size:17px;margin-right: 15px;"></i>
                <div class="dropdown-menu">

                        <a class="dropdown-item pay" target="_blank" style="cursor: pointer;"
                          data-invoice="'.$data->id.'" data-route="'.route('hospital.invoice.pay').'">
                             دفع
                             <i title="دفع"
                                class="fa fa-money-check-dollar"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                        </a>

                        <a class="dropdown-item edit"  style="cursor: pointer;"
                          data-id="'.$data->id.'" data-route="'.route('hospital.invoice.edit').'">
                             تعديل
                             <i title="تعديل"
                                class="fa fa-pencil"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                        </a>

                        <a class="dropdown-item" style="cursor: pointer;"
                        href="'.route('hospital.invoice.show',['id'=>$data->id,'name'=>str_replace(' ','_',$data->patient->name)]).'" target="_blank">
                             عرض
                             <i title="عرض"
                                class="fa fa-eye show"
                                style="color:blue;font-size:17px"></i>
                        </a>

                        <a class="dropdown-item delete" style="cursor: pointer;" data-id="'.$data->id.'" data-route="'.route('hospital.invoice.delete',$data->id).'" style="cursor: pointer;">
                             حذف
                              <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="fa fa-trash delete" style="cursor: pointer;color:#ff0000;font-size:17px"></i>
                        </a>
                </div>';

            })

            ->addColumn('created_At', function ($data) {
                //to create raw [created_At]
                return "<span style='color:#727E8C;white-space: nowrap;'>" . date_format($data->created_at,'Y-m-d') . "</span>";
            })
            ->addColumn('updated_At', function ($data) {
                //to create raw [updated_At]
                return " <span  style='color:#727E8C;white-space: nowrap;'>" . date_format($data->updated_at,'Y-m-d') . "</span>";
            })

            ->addColumn('multi_delete', function ($data) {
                //to create raw [updated_At]
                return '<div class="form-check">
                          <input class="form-check-input row_check" type="checkbox" style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;"
                           value="'.$data->id.'" id="flexCheckIndeterminate'.$data->id.'">
                          <label class="form-check-label" for="flexCheckIndeterminate'.$data->id.'"></label>
                        </div>';
            })
            ->rawColumns(['deserved_amount','status','action','created_At','updated_At','multi_delete']);
    }


    public function query()
    {
        return Invoice::query()->with(['patient'])->where('patient_id',$this->patient_id)->select('invoices.*');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('invoice_table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orders([0])
            ->parameters([
                'searching' =>true,
                'paging'   => true,
                'bLengthChange'   => true,
                'bInfo'   => true,
                'responsive'   => true,
                'dom' => 'Blfrtip',
                'language' => [
                    'Copy' => 'نسخ'
                ]

            ])

            ->addColumnBefore([
                'defaultContent' => '',
                'data'           => 'DT_RowIndex',
                'name'           => 'id',
                'title'          => '#',
                'render'         => null,
                'orderable'      => true,
                'searchable'     => true,
                'padding'=>'13px',
            ]);
    }


    protected function getColumns()
    {
        return [
            Column::computed('patient.name')
                ->title('اسم المريض')
                ->orderable(false)
                ->searchable(true),
            Column::computed('total')
                ->title('المبلغ الاجمالي')
                ->orderable(false)
                ->searchable(true),
            Column::computed('deserved_amount')
                ->title('المبلغ المستحق')
                ->orderable(false)
                ->searchable(true),
            Column::computed('amount_paid')
                ->title('المبلغ المدفوع')
                ->orderable(false)
                ->searchable(true),
            Column::computed('status')
                ->title('الحالة')
                ->orderable(false)
                ->searchable(true),
            Column::computed('created_At')
                ->title('تم الانشاء بتاريخ')
                ->orderable(false)
                ->searchable(true),
            Column::make('updated_At')
                ->title('تم التعديل بتاريخ')
                ->orderable(false)
                ->searchable(true),
            Column::computed('action')
                ->title('الاعدادت')
                ->orderable(false)
                ->searchable(false),
            Column::computed('multi_delete')
                ->title('<div class="form-check">
                          <input class="form-check-input" type="checkbox" id="main_row_check"
                           style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;" >
                          <label class="form-check-label" for="main_row_check"></label>
                        </div>')
                ->orderable(false)
                ->searchable(false),

            Column::computed('invoice_number')
                ->title('رقم الفاتورة')
                ->orderable(false)
                ->searchable(true),
        ];
    }

    protected function filename()
    {
        return 'Invoice_' . date('YmdHis');
    }
}
