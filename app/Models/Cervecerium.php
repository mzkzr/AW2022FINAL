<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cervecerium extends Model
{
    protected $fillable = [
        'cuit',
        'domicilio',
        'localidad_id',
        'nombre',
        'provincia_id',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cerveceria/'.$this->getKey());
    }

    public function provincia() {
        return $this->belongsTo(Provincium::class);
    }

    public function localidad() {
        return $this->belongsTo(Localidad::class);
    }
    
    public function puntoVenta()
    {
        return $this->hasMany(PuntoVentum::class);
    }
}
