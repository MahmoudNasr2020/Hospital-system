<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthSalary extends Model
{
    use HasFactory;

    protected $fillable = ['month','year','date','added_by'];

    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }
}
