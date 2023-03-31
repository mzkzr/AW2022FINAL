<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PuntoVentum extends Model
{
    protected $fillable = [
        'cerveza_id',
        'cerveceria_id',
        'presentaciones'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['cerveza', 'cerveceria', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/punto-venta/'.$this->getKey());
    }

    public function getCervezaAttribute()
    {
        $cerveza = Cerveza::find($this->cerveza_id);
        return $cerveza->nombre;
    }

    public function getCerveceriaAttribute()
    {
        $cerveceria = Cervecerium::find($this->cerveceria_id);
        return $cerveceria->nombre;
    }

    /* *********************** RELACIONES ************************ */

    public function cerveza() {
        return $this->belongsTo(Cerveza::class);
    }

    public function cerveceria() {
        return $this->belongsTo(Cervecerium::class);
    }
}
