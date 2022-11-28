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
        //'horario_atencion'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['localidad', 'provincia', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cerveceria/'.$this->getKey());
    }

    public function getProvinciaAttribute()
    {
        $provincia = Provincium::find($this->provincia_id);
        return $provincia->nombre;
    }

    public function getLocalidadAttribute()
    {
        $localidad = Localidad::find($this->localidad_id);
        return $localidad->nombre;
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
