<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $table = 'productor';

    protected $fillable = [
        'nombre',
        'cuit',
        'domicilio',
        'provincia_id',
        'localidad_id'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['localidad', 'provincia', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/productors/'.$this->getKey());
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

    public function cervezas()
    {
        return $this->hasMany(Cerveza::class);
    }
}
