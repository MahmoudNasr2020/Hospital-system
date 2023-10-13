<?php

namespace App\DataTables;

use App\Models\Patient;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AssignRoomDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addIndexColumn()

            ->addColumn('added_by',function($data){

                if($data->user_room != null)
                {
                    if($data->user_room->user_type == 'admin')
                    {
                        return '<a href="'.route('hospital.admin.show',['id'=>$data->room_added,'name'=> str_replace(' ','_',$data->user_room->name)]).'" target="_blank">'.$data->user_room->name.'</a>';
                    }

                    else
                    {
                        $user = $data->user_room->user_type;
                        $user = ucfirst($user);
                        $model = '\App\Models\\';
                        $model .= $user;
                        $user = $model::where('user_id',$data->user_room->id)->first();
                        return '<a href="'.route('hospital.'.$data->user_room->user_type.'.show',['id'=>$user->id,'name'=> str_replace(' ','_',$user->name)]).'" target="_blank">'.$user->user->name.'</a>';
                    }
                }

                else
                    {
                        return 'غير مسجل';
                    }
            })
            ->addColumn('department',function($data){
                return $data->room->department->name;

            })

            ->addColumn('action',function($data){
                return '<i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Show" class="fa fa-eye showing"
                            data-route="'.route('hospital.assign_room.show',$data->id).'"
                            data-id="'.$data->id.'" style="cursor: pointer;color:blue;font-size:17px"></i>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" class="fa fa-pencil edit" data-id="'.$data->id.'" data-route="'.route('hospital.assign_room.edit',$data->id).'" style="cursor: pointer;color:green;font-size:17px"></i>
                                <i data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete" class="fa fa-trash delete" data-id="'.$data->id.'" data-route="'.route('hospital.assign_room.delete',$data->id).'" style="cursor: pointer;color:#ff0000;font-size:17px"></i>';

            })
            ->addColumn('multi_delete', function ($data) {
                //to create raw [updated_At]
                return '<div class="form-check">
                          <input class="form-check-input row_check" type="checkbox" style="width: 1.5em !important; height: 1.5em !important;border: 1px solid #aaa;"
                           value="'.$data->id.'" id="flexCheckIndeterminate'.$data->id.'">
                          <label class="form-check-label" for="flexCheckIndeterminate'.$data->id.'"></label>
                        </div>';
            })
            ->rawColumns(['name','department','added_by','action','created_At','updated_At','multi_delete']);
    }


    public function query(Patient $model)
    {
        return Patient::query()->with('room','user_room')->whereNotNull('room_id')->select('id','name','room_id','room_added');
    }


    public function html()
    {
        return $this->builder()
            ->setTableId('assign_room_table')
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
                ->title('اسم المريض')
                ->orderable(false)
                ->searchable(true),
            Column::computed('department')
                ->title('القسم')
                ->orderable(false)
                ->searchable(true),
            Column::computed('room.room_number')
                ->title('رقم الغرفة')
                ->orderable(false)
                ->searchable(true),
            Column::computed('added_by')
                ->title('تمت الاضافة بواسطة')
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
        return 'AssignRoom_' . date('YmdHis');
    }
}
