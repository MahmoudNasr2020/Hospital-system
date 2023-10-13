<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'reports';
    protected $fillable = ['description','added_by','patient_id'];

    public function patient()
    {
        return $this->belongsTo(Patient::class,'patient_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }
}
