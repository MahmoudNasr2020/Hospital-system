<?php /** @noinspection PhpDocSignatureInspection */


namespace App\Http\Eloquent;


use App\Http\Interfaces\ReportRepositoryInterface;
use App\Models\Patient;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ReportRepository implements ReportRepositoryInterface
{

    public function indexPatient($dataTable)
    {
        return $dataTable->render('Hospital.pages.reports.patients.index');
    }

    public function index($dataTable,$id)
    {
        $patient = Patient::find($id);
        if(!$patient)
        {
            return abort('404');
        }
        $dataTable->patient_id = $id;
        return $dataTable->render('Hospital.pages.reports.reports.index');
    }

    public function create($id)
    {
        $patient = Patient::findOrFail($id);
        return view('Hospital.pages.reports.reports.components.include.add',['patient'=>$patient]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {

        $patient = Patient::find($request->patient_id);

        if (!$patient)
        {
            return 'error';
        }
        $report = Report::create([
            'patient_id' => $patient->id,
            'added_by' => Auth::user()->id,
            'description' => $request->description
        ]);
        if (!$report)
        {
            return 'error';
        }

        return 'done';

    }

    public function show($id)
    {
        $data = Report::findOrFail($id);
        return view('Hospital.pages.reports.reports.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = Report::with('patient')->findOrFail($data);
        return view('Hospital.pages.reports.reports.components.include.edit',compact('data'));
    }
    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     */
    public function update($request)
    {
        $data = Report::find($request->id);

        if (!$data)
        {
            return 'error';
        }
        $report = $data->update([
            'added_by' => Auth::user()->id,
            'description' => $request->description
        ]);
        if (!$report)
        {
            return 'error';
        }

        return 'done';
    }

    public function delete($model,$item)
    {
        $item = Report::find($item);
        if(!$item)
        {
            return 'error';
        }
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        Report::whereIn('id',$data)->delete();
        return 'done';
    }

}
