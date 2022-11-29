<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuntoVentum extends Model
{
    protected $fillable = [
        'cerveza_id',
        'cerveceria_id'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/punto-venta/'.$this->getKey());
    }

    public function cerveza() {
        return $this->belongsTo(Cerveza::class);
    }

    public function cerveceria() {
        return $this->belongsTo(Cervecerium::class);
    }
}
