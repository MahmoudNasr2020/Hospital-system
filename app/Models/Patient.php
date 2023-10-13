<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'identify_no', 'address', 'gender', 'age',
                            'mobile_phone', 'date_joining', 'date_exiting', 'photo','room_id','room_added'];

    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    public function user_room()
    {
        return $this->belongsTo(User::class,'room_added');
    }
    public function reports()
    {
        return $this->hasMany(Report::class,'patient_id');
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class,'patient_id');
    }
}
