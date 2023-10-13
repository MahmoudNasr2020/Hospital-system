<?php


namespace App\Http\Eloquent;


use App\Http\Interfaces\InvoiceRepositoryInterface;
use App\Http\services\paymob;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Patient;
use App\Models\PaymentStatus;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class InvoiceRepository implements InvoiceRepositoryInterface
{

    public function indexPatient($dataTable)
    {

        return $dataTable->render('Hospital.pages.invoices.patients.index');
    }

    public function index($dataTable,$id)
    {
        $patient = Patient::find($id);
        if(!$patient)
        {
          return abort('404');
        }
        $dataTable->patient_id = $id;
        return $dataTable->render('Hospital.pages.invoices.invoices.index');
    }

    public function create($id)
    {
        $patient = Patient::findOrFail($id);
        return view('Hospital.pages.invoices.invoices.components.include.add',['patient'=>$patient]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store($request)
    {
        $patient = Patient::find($request->patient_id);

        if (!$patient)
        {
            return 'error';
        }
        $invoice = Invoice::create([
            'patient_id' => $patient->id,
            'invoice_number' => uniqid(),
            'total' => $request->total,
        ]);
        if (!$invoice)
        {
            return 'error';
        }

        return 'done';

    }

    public function pay($request)
    {
        $data = Invoice::find($request->data);
        if (!$data)
        {
            return 'error';
        }
        return $data;
    }

    public function payCache($request)
    {
        $invoice = Invoice::find($request->id);
        if (!$invoice)
        {
            return 'error';
        }
       DB::beginTransaction();
        $invoice_transaction = $invoice->update([
            'amount_paid' => $invoice->amount_paid + $request->paid,
            'payment_type' => 'نقدي',
        ]);
        $payment_status = PaymentStatus::create([
            'invoice_id' => $invoice->id,
            'added_by' => Auth::user()->id,
            'total_paid' => $invoice->amount_paid,
            'amount_paid' => $request->paid,
            'payment_type' => 'نقدي',
        ]);

        $status = 0;
        if (($invoice->total - $invoice->amount_paid) <= 0)
        {
            $status = 'مدفوع كلياً';
        }
        elseif ($invoice->total > $invoice->amount_paid && $invoice->amount_paid > 0)
        {
            $status = 'مدفوع جزئياً';
        }
        elseif(($invoice->total - $invoice->paid == $invoice->total) || $invoice->paid < 0)
        {
            $status = 'غير مدفوع';
        }

         $invoice_status = $invoice->update([
            'payment_status' => $status
        ]);

        if(!$invoice_transaction || !$payment_status || !$invoice_status)
        {
            DB::rollBack();
            return 'error';
        }

        DB::commit();
        return 'done';

    }

    public function payOnline($request,$paymob)
    {
        $invoice = Invoice::find($request->id);
        if (!$invoice)
        {
            return 'error';
        }
        $patient = Patient::where('id',$invoice->patient_id)->select('id','name','mobile_phone')->first();
        $first_name = substr($patient->name,0,strpos($patient->name,' '));
        $last_name  = substr($patient->name,strpos($patient->name,' '));
        $price = $request->paid *100;
        $paymob = $paymob->credit($price,$invoice->id,$first_name,$last_name,$patient->mobile_phone);
        return $paymob['url'] ;
    }

    public function callback($request,$paymob)
    {
        $callback =  $paymob->callback($request);
        if ($callback['process'] == 'secret')
        {
           $order =  Order::where('order_id',$callback['order_id'])->first();
           $invoice = Invoice::where('id',$order->invoice_id)->first();
            if (!$invoice)
            {
                return abort('404');
            }
            DB::beginTransaction();
            $invoice_transaction = $invoice->update([
                'amount_paid' => $invoice->amount_paid + $callback['price'],
                'payment_type' => 'الكتروني',
            ]);
            $payment_status = PaymentStatus::create([
                'invoice_id' => $invoice->id,
                'added_by' => Auth::user()->id,
                'total_paid' => $invoice->amount_paid,
                'amount_paid' => $callback['price'],
                'payment_type' => 'الكتروني',
            ]);

            $status = 0;
            if (($invoice->total - $invoice->amount_paid) <= 0)
            {
                $status = 'مدفوع كلياً';
            }
            elseif ($invoice->total > $invoice->amount_paid && $invoice->amount_paid != 0)
            {
                $status = 'مدفوع جزئياً';
            }
            elseif(($invoice->total - $invoice->paid == $invoice->total) || $invoice->paid < 0)
            {
                $status = 'غير مدفوع';
            }

            $invoice_status = $invoice->update([
                'payment_status' => $status
            ]);

            if(!$invoice_transaction || !$payment_status || !$invoice_status)
            {
                DB::rollBack();
                return redirect()->route('hospital.invoice.index',['id'=>$invoice->patient_id,'name'=>str_replace(' ','_',$invoice->patient->name)])->with('status','error');
            }

            DB::commit();
            return redirect()->route('hospital.invoice.index',['id'=>$invoice->patient_id,'name'=>str_replace(' ','_',$invoice->patient->name)])->with('status','success');
        }
        return 0;
    }

    public function show($id)
    {
        $data = Invoice::with(['patient:id,name,identify_no,photo','PaymentStatuses'])->findOrFail($id);
        return view('Hospital.pages.invoices.invoices.components.include.show',compact('data'));
    }

    public function edit($request)
    {
         $data = Invoice::select('id','total')->findOrFail($request->id);
        if(!$data)
        {
            return 'error';
        }
        return $data;
    }
    /** @noinspection PhpUndefinedMethodInspection
     * @noinspection DuplicatedCode
     */
    public function update($request)
    {
        $data = Invoice::find($request->invoice_id);

        if (!$data)
        {
            return 'not_found';
        }
        $invoice = $data->update([
            'total' => $request->total
        ]);
        if (!$invoice)
        {
            return 'error';
        }

        return 'done';
    }

    public function delete($model,$item)
    {
        $item = Invoice::find($item);
        if(!$item)
        {
            return 'error';
        }
        PaymentStatus::where('invoice_id',$item->id)->orderBy('id','desc')->delete();
        $item->delete();
        return 'done';
    }

    /** @noinspection PhpUnused */
    public function multi_delete($model,array $data)
    {
        PaymentStatus::whereIn('invoice_id',$data)->delete();
        Invoice::whereIn('id',$data)->delete();
        return 'done';
    }
}
