<?php /** @noinspection PhpDocSignatureInspection */


namespace App\Http\Eloquent;


use App\Http\Interfaces\DoctorRepositoryInterface;
use App\Http\Interfaces\PatientRepositoryInterface;
use App\Http\Traits\Image;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\PaymentStatus;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PatientRepository implements PatientRepositoryInterface
{
    use Image;

    public function index($dataTable)
    {
        return $dataTable->render('Hospital.pages.patients.index');
    }


    public function create()
    {
        return view('Hospital.pages.patients.components.include.add');
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {
        if($request->hasFile('image'))
        {
             $image = $this->imageUpload('patients',$request->file('image'));
             $request->request->add(['photo'=>$image]);
        }
        $patient = Patient::create($request->except(['image']));

        if (!$patient)
        {
            return 'error';
        }
        return 'done';

    }

    public function show($id)
    {
        $data = Patient::findOrFail($id);
        return view('Hospital.pages.patients.components.include.show',compact('data'));
    }

    public function edit($data)
    {
        $data = Patient::findOrFail($data);
        return view('Hospital.pages.patients.components.include.edit',compact('data'));
    }
    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     */
    public function update($request,$id)
    {
        $data = Patient::find($id);

        if(!$data)
        {
            return 'error';
        }
        if($request->hasFile('image'))
        {
            $this->deleteImage('Hospital/Images/'.$data->photo);
            $image = $this->imageUpload('patients',$request->file('image'));
            $request->request->add(['photo'=>$image]);
        }
        $patient = $data->update($request->except(['image']));

        if (!$patient)
        {
            return 'error';
        }
        return 'done';
    }

    public function delete($model,$item)
    {
        $item = Patient::find($item);
        if(!$item)
        {
            return 'error';
        }
        $this->deleteImage('Hospital/Images/patients/'.$item->photo);
        $item->reports()->delete();
        $invoices = $item->invoices;
        foreach ($invoices as $invoice)
        {
            PaymentStatus::where('invoice_id',$invoice->id)->orderBy('id','desc')->delete();
        }
        $item->invoices()->delete();
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        foreach ($data as $item)
        {
            $item = $model::findOrFail($item);
            $this->deleteImage('Hospital/Images/patients/'.$item->photo);
            $item->reports()->delete();
            $invoices = $item->invoices;
            foreach ($invoices as $invoice)
            {
                PaymentStatus::where('invoice_id',$invoice->id)->orderBy('id','desc')->delete();
            }
            $invoices->delete();
            $item->delete();
        }
        return 'done';
    }

}
