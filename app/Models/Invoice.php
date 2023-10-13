<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id','invoice_number','total','amount_paid','payment_type','payment_status'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function PaymentStatuses()
    {
        return $this->hasMany(PaymentStatus::class,'invoice_id');
    }

}
