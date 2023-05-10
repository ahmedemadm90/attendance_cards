<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'vp_id','area_id','serial','en_name','ar_name','position','company','email', 'hc_classification', 'type'
    ];
    public function vp()
    {
        return $this->belongsTo(Vp::class);
    }
    public function area()
    {
        return $this->belongsTo(Area::class);
    }
    public function requests()
    {
        return $this->hasMany(CardRequest::class);
    }
}
