<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\MonthSalaryRepositoryInterface;
use App\Models\Department;
use App\Models\MonthSalary;
use App\Models\Room;
use Illuminate\Support\Facades\Auth;

class MonthSalaryRepository implements MonthSalaryRepositoryInterface
{
    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.monthsalaries.index');
    }


    public function store($request)
    {

        $date = date_create($request->year.'-'.$request->month);
        $store = MonthSalary::create([
            'month'=>$request->month,
            'year'=>$request->year,
             'date'=>$date,
             'added_by' => Auth::user()->id,
        ]);
        if(!$store)
        {
            return 'error';
        }
        return 'done';
    }

    public function show($id)
    {
        $data = Room::find($id);

        if(!$data)
        {
            return 'error';
        }
        return $data;
    }
    public function edit($id)
    {
        $data = MonthSalary::find($id);

        if(!$data)
        {
            return 'error';
        }
        return $data;
    }

    public function update($request)
    {
        $data = MonthSalary::find($request->id);
        if(!$data)
        {
            return 'error';
        }
        $date = date_create($request->year.'-'.$request->month);
        $request->request->add(['date'=>$date]);
        $update = $data->update($request->except('id'));
        if(!$update)
        {
            return 'error';
        }
        return 'done';
    }

    public function delete($model,$id)
    {
        $data = $model::find($id);
        if(!$data)
        {
            return 'error';
        }
        $data->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        $model::whereIn('id',$data)->delete();
        return 'done';
    }
}
