<?php /** @noinspection ALL */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['gender','address','salary','date_of_birth','date_joining',
                            'mobile_phone','home_phone','identify_no','department_id','user_id'];

    public function department()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
