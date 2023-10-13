<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = ['date','note','attendance','user_id','added_by'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function addedBy()
    {
        return $this->belongsTo(User::class,'added_by');
    }
}
