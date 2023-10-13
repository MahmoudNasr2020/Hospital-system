<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PatientDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('age',function($data){
                return $data->age . ' سنة';

            })
            ->addColumn('action',function($data){
                return '
                  <i class="fa  fa-ellipsis-vertical" data-toggle="dropdown" style="cursor: pointer;font-size:17px;margin-right: 15px;"></i>
                <div class="dropdown-menu">
                        <a class="dropdown-item" href="'.route('hospital.patient.show',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             عرض
                             <i title="عرض"
                                class="fa fa-eye show"
                                style="cursor: pointer;color:blue;font-size:17px"></i>
                        </a>
                        <a class="dropdown-item" href="'.route('hospital.patient.edit',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             تعديل
                             <i title="تعديل"
                                class="fa fa-pencil edit"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                        </a>
                        <a class="dropdown-item" href="'.route('hospital.report.create',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             اضافة تقرير
                             <i title="اضافة تقرير"
                                class="fa fa-plus add" data-id="'.$data->id.'"
                                style="cursor: pointer;color:blueviolet;font-size:17px"></i>
                        </a>
                        <a class="dropdown-item" href="'.route('hospital.report.',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             عرض التقارير
                               <i title="عرض التقارير"
                                class="fa fa-file show_report"
                                style="cursor: pointer;color:darkcyan;font-size:17px"></i>
                        </a>

                        <a class="dropdown-item" href="'.route('hospital.invoice.create',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             اضافة فاتورة
                             <i title="اضافة فاتورة"
                                class="fa fa-plus add" data-id="'.$data->id.'"
                                style="cursor: pointer;color:brown;font-size:17px"></i>
                        </a>
                        <a class="dropdown-item" href="'.route('hospital.invoice.index',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             عرض الفواتير
                               <i title="عرض الفواتير"
                                class="fa fa-money-check-dollar show_report"
                                style="cursor: pointer;color:forestgreen;font-size:17px"></i>
                        </a>

                        <a class="dropdown-item delete" data-id="'.$data->id.'" data-route="'.route('hospital.patient.delete',$data->id).'" style="cursor: pointer;">
                             حذف
                              <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="fa fa-trash delete" style="cursor: pointer;color:#ff0000;font-size:17px"></i>
                        </a>
                </div>';

            })
            ->addColumn('created_At', function ($data) {
                //to create raw [created_At]
                return "<span style='color:#727E8C'>" . $data->created_at->diffForHumans() . "</span>";
            })
            ->addColumn('updated_At', function ($data) {
                //to create raw [updated_At]
                return " <span  style='color:#727E8C'>" . $data->updated_at->diffForHumans() . "</span>";
            })

            ->addColumn('multi_delete', function ($data) {
                //to create raw [updated_At]
                return '<div class="form-check">
                          <input class="form-check-input row_check" type="checkbox" style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;"
                           value="'.$data->id.'" id="flexCheckIndeterminate'.$data->id.'">
                          <label class="form-check-label" for="flexCheckIndeterminate'.$data->id.'"></label>
                        </div>';
            })
            ->rawColumns(['name','action','created_At','updated_At','multi_delete']);
    }


    public function query()
    {
        return Patient::query()->select('patients.*');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('patient_table')
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
            Column::computed('name')
                ->title('الاسم')
                ->orderable(false)
                ->searchable(true),
            Column::computed('gender')
                ->title('النوع')
                ->orderable(false)
                ->searchable(true),
            Column::computed('age')
                ->title('العمر')
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
        ];
    }
    protected function filename()
    {
        return 'Pateint_' . date('YmdHis');
    }
}
