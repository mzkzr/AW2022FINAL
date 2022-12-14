<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
    protected $table = 'cerveza';

    protected $fillable = [
        'productor_id',
        'nombre',
        'descripcion',
        'ibu',
        'abv',
        'srm',
        'og'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['productor', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cervezas/'.$this->getKey());
    }

    public function getProductorAttribute()
    {
        $productor = Productor::find($this->productor_id);
        return $productor->nombre;
    }

    public function productor() {
        return $this->belongsTo(Productor::class);
    }

    public function puntoVenta()
    {
        return $this->hasMany(PuntoVentum::class);
    }
}
