<?php

namespace App\DataTables;

use App\Models\MonthSalary;
use App\Models\MonthSalaryDataTable;
use App\Models\Room;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class Month_salaryDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('added_by',function($data){

                if($data->addedBy != null)
                {
                    if($data->addedBy->user_type == 'admin')
                    {
                        return '<a href="'.route('hospital.admin.show',['id'=>$data->added_by,'name'=> str_replace(' ','_',$data->addedBy->name)]).'" target="_blank">'.$data->addedBy->name.'</a>';
                    }

                    else
                    {
                        $user = $data->addedBy->user_type;
                        $user = ucfirst($user);
                        $model = '\App\Models\\';
                        $model .= $user;
                        $user = $model::where('user_id',$data->addedBy->id)->first();
                        return '<a href="'.route('hospital.'.$data->addedBy->user_type.'.show',['id'=>$user->id,'name'=> str_replace(' ','_',$user->name)]).'" target="_blank">'.$user->name.'</a>';
                    }
                }

                else
                {
                    return 'غير مسجل';
                }
            })

            ->addColumn('action',function($data){
                        return '<a href="'.route('hospital.salary.',['month'=>$data->id]).'" target="_blank">
                                    <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="صرف الرواتب" class="fa fa-file-invoice-dollar"
                                    style="cursor: pointer;color:sienna;font-size:17px"></i>
                                </a>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="تعديل" class="fa fa-pencil edit"
                                data-id="'.$data->id.'" data-route="'.route('hospital.monthsalary.edit',$data->id).'"
                                style="cursor: pointer;color:green;font-size:17px"></i>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف" class="fa fa-trash delete"
                                data-id="'.$data->id.'" data-route="'.route('hospital.monthsalary.delete',$data->id).'"
                                style="cursor: pointer;color:#ff0000;font-size:17px"></i>';

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
            ->rawColumns(['added_by','action','created_At','updated_At','multi_delete']);
    }


    public function query()
    {
        return MonthSalary::query()->with('addedBy')->orderBy('year','desc')->orderBy('month','asc')->select('month_salaries.*');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('monthsalary_table')
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
            Column::computed('year')
                ->title('السنة')
                ->orderable(false)
                ->searchable(true),
            Column::computed('month')
                ->title('الشهر')
                ->orderable(false)
                ->searchable(true),
            Column::computed('added_by')
                ->title('تم الاضافة بواسطة')
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
        return 'MonthSalary_' . date('YmdHis');
    }
}
