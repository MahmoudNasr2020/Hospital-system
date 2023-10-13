<?php  /** @noinspection All */

namespace App\Http\Controllers\Hospital\Department;

use App\DataTables\DepartmentDataTable;
use App\Http\classes\General;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\GlobalRepositoryInterface;
use App\Http\Requests\Hospital\Department\DepartmentRequest;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    private $global;
    public function __construct(GlobalRepositoryInterface $global)
    {
        $this->global = $global;
        $this->middleware('permission:عرض-قسم',['only'=>['index','show']]);
        $this->middleware('permission:اضافة-قسم',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-قسم',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-قسم',['only'=>['delete','multi_delete']]);
    }

    public function index(General $general, DepartmentDataTable $dataTable)
    {
       //return $this->global->index(null,'welcome',Category::first());
       return $this->global->index($general,'Hospital.pages.departments.index',null,$dataTable);
    }

    public function store(General $general, DepartmentRequest $request)
    {
        return $this->global->store($general,Department::class,$request);
    }

    public function show(General $general,$id)
    {
        return $this->global->show($general,null,Department::class,$id);
    }

    public function edit(General $general,$id)
    {
        return $this->global->edit($general,null,Department::class,$id);
    }

    public function update(General $general, DepartmentRequest $request)
    {
        return $this->global->update($general,Department::class,$request);
    }
    public function delete(General $general,$id)
    {
        return $this->global->delete($general,Department::class,$id);
    }

    public function multi_delete(General $general,Request $request)
    {
        return $this->global->multi_delete($general,Department::class,$request->data);
    }
}
