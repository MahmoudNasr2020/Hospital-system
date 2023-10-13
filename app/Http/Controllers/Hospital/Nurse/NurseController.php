<?php /** @noinspection PhpUnused */

namespace App\Http\Controllers\Hospital\Nurse;

use App\DataTables\NurseDataTable;
use App\Http\Controllers\Controller;
use App\Http\Interfaces\NurseRepositoryInterface;
use App\Http\Requests\Hospital\Nurse\AddNurseRequest;
use App\Http\Requests\Hospital\Nurse\UpdateLaborerRequest;
use App\Models\Nurse;
use Illuminate\Http\Request;

class NurseController extends Controller
{
    private $repository;

    public function __construct(NurseRepositoryInterface $nurseRepository)
    {
        $this->repository = $nurseRepository;
        $this->middleware('permission:عرض-ممرض',['only'=>['index','show','status']]);
        $this->middleware('permission:اضافة-ممرض',['only'=>['create','store']]);
        $this->middleware('permission:تعديل-ممرض',['only'=>['edit','update']]);
        $this->middleware('permission:حذف-ممرض',['only'=>['delete','multi_delete']]);
    }
    public function index(NurseDataTable $dataTable)
    {
        return $this->repository->index($dataTable);
    }
    public function create()
    {
        return $this->repository->create();
    }
    public function store(AddNurseRequest $request)
    {
        return $this->repository->store($request);
    }
    public function edit($id)
    {
        return $this->repository->edit($id);
    }

    public function show($id)
    {
        return $this->repository->show($id);
    }

    public function update(UpdateLaborerRequest $request, $id)
    {
        return $this->repository->update($request,$id);
    }

    public function delete($id)
    {
        return $this->repository->delete(Nurse::class,$id);
    }

    public function multi_delete(Request $request)
    {
        return $this->repository->multi_delete(Nurse::class,$request->data);
    }

    public function status(Request $request)
    {
        return $this->repository->status($request);
    }
}
