<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

use Yajra\DataTables\Services\DataTable;

class PatientReportDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return '
                  <a href="'.route('hospital.report.create',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                                <i title="اضافة تقرير"
                                class="fa fa-plus add" data-id="'.$data->id.'"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                                </a>

                                <a href="'.route('hospital.report.',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                                <i title="عرض التقارير"
                                class="fa fa-file show_report" data-id="'.$data->id.'" data-route="'.route('hospital.patient.edit',$data->id).'"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                                </a>
                <a href="'.route('hospital.patient.show',['id'=>$data->id,'name'=>str_replace(' ','_',$data->name)]).'" target="_blank">
                             <i title="عرض" class="fa fa-eye showing"
                            data-id="'.$data->id.'" style="cursor: pointer;color:blue;font-size:17px"></i>
                        </a>
                             ';

            })

            ->rawColumns(['name','action']);
    }


    public function query()
    {
        return Patient::query()->select('patients.*');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('patientReport_table')
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
            Column::computed('identify_no')
                ->title('رقم الهوية')
                ->orderable(false)
                ->searchable(true),
            Column::computed('date_joining')
                ->title('تاريخ الدخول')
                ->orderable(false)
                ->searchable(true),
            Column::computed('action')
                ->title('الاعدادت')
                ->orderable(false)
                ->searchable(false),
        ];
    }

    protected function filename()
    {
        return 'PatientReport_' . date('YmdHis');
    }
}
