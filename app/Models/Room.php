<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = ['room_number','beds','department_id'];

    public function patients()
    {
        return $this->hasMany(Patient::class,'room_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
}
