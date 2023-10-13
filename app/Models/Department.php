<?php /** @noinspection ALL */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $fillable = ['name','description'];

    public function doctors()
    {
        return $this->hasMany(Doctor::class,'department_id');
    }
}
