<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardRequest extends Model
{
    use HasFactory;
    protected $fillable = ['employee_id','admin_approve','emp_image','doc_image','is_printed'];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
