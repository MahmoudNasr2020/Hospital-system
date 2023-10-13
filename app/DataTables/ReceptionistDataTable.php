<?php

namespace App\DataTables;

use App\Models\Receptionist;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class ReceptionistDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()
            ->addColumn('action',function($data){
                return '<a href="'.route('hospital.receptionist.show',['id'=>$data->id,'name'=>str_replace(' ','_',$data->user->name)]).'">
                             <i title="Show" class="fa fa-eye showing"
                            data-id="'.$data->id.'" style="cursor: pointer;color:blue;font-size:17px"></i>
                        </a>

                               <a href="'.route('hospital.receptionist.edit',['id'=>$data->id,'name'=>str_replace(' ','_',$data->user->name)]).'">
                                <i title="Edit"
                                class="fa fa-pencil edit" data-id="'.$data->id.'" data-route="'.route('hospital.receptionist.edit',$data->id).'"
                                style="cursor: pointer;color:green;font-size:17px"></i></a>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="fa fa-trash delete" data-id="'.$data->id.'"
                                data-route="'.route('hospital.receptionist.delete',$data->id).'" style="cursor: pointer;color:#ff0000;font-size:17px"></i>';

            })
            ->addColumn('created_At', function ($data) {
                //to create raw [created_At]
                return "<span style='color:#727E8C'>" . $data->created_at->diffForHumans() . "</span>";
            })
            ->addColumn('updated_At', function ($data) {
                //to create raw [updated_At]
                return " <span  style='color:#727E8C'>" . $data->updated_at->diffForHumans() . "</span>";
            })
            ->addColumn('status', function ($data) {
                //to create raw [updated_At]
                $checked = $data->status == "مفعل" ?"checked" :'';
                return '<div class="form-check form-switch">
                          <input class="form-check-input status" data-id="'.$data->id.'" type="checkbox" '.$checked.' style="width: 32px;height: 18px;" id="flexSwitchCheckDefault">
                          <label class="form-check-label" for="flexSwitchCheckDefault"></label>
                        </div>';
            })
            ->addColumn('multi_delete', function ($data) {
                //to create raw [updated_At]
                return '<div class="form-check">
                          <input class="form-check-input row_check" type="checkbox" style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;"
                           value="'.$data->id.'" id="flexCheckIndeterminate'.$data->id.'">
                          <label class="form-check-label" for="flexCheckIndeterminate'.$data->id.'"></label>
                        </div>';
            })
            ->rawColumns(['name','status','action','created_At','updated_At','multi_delete']);
    }


    public function query(Receptionist $model)
    {
        return Receptionist::query()->with(['user'])->select('receptionists.*');
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('receptionist_table')
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
            Column::computed('user.name')
                ->title('الاسم')
                ->orderable(false)
                ->searchable(true),
            Column::computed('mobile_phone')
                ->title('رقم الموبايل')
                ->orderable(false)
                ->searchable(true),
            Column::computed('gender')
                ->title('النوع')
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
            Column::computed('status')
                ->title('الحالة')
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
        return 'Receptionist_' . date('YmdHis');
    }
}
