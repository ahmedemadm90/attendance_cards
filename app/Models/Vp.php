<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vp extends Model
{
    use HasFactory;
    public $fillable = ['vp_name'];
    public function areas()
    {
        return $this->hasMany(Area::class);
    }
    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
