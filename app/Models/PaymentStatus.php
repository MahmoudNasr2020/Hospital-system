<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    protected $fillable = ['invoice_id','added_by','total_paid','amount_paid','payment_type'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class,'invoice_id');
    }
    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }
}
