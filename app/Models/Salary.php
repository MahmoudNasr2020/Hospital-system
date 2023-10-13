<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable = ['month_id','user_id','salary_paid','incentives','discounts','added_by'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function month()
    {
        return $this->belongsTo(MonthSalary::class,'month_id');
    }

    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }

}
