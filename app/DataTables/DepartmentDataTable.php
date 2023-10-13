<?php

namespace App\DataTables;

use App\Models\Department;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class DepartmentDataTable extends DataTable
{

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return '<i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show" class="fa fa-eye showing"
                            data-route="'.route('hospital.department.show',$data->id).'"
                            data-id="'.$data->id.'" style="cursor: pointer;color:blue;font-size:17px"></i>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" class="fa fa-pencil edit"
                                data-id="'.$data->id.'" data-route="'.route('hospital.department.edit',$data->id).'" style="cursor: pointer;color:green;font-size:17px"></i>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="fa fa-trash delete"
                                data-id="'.$data->id.'" data-route="'.route('hospital.department.delete',$data->id).'" style="cursor: pointer;color:#ff0000;font-size:17px"></i>';

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


    public function query(Department $model)
    {
        return $model->newQuery();
    }


    public function html()
    {
        return $this->builder()
                    ->setTableId('department_table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->orders([0])
                    ->parameters([
                        'dom' => 'Blfrtip',
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
                ->title('اسم القسم')
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
        return 'Category_' . date('YmdHis');
    }
}
