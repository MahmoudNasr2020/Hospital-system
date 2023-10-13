<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{
    use HasFactory;

    protected $fillable = ['gender','address','salary','date_of_birth','date_joining',
        'mobile_phone','home_phone','identify_no','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
