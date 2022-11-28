<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table = 'localidad';

    protected $fillable = [
        'provincia_id',
        'nombre'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['provincia', 'resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/localidads/'.$this->getKey());
    }

    public function getProvinciaAttribute()
    {
        $provincia = Provincium::find($this->provincia_id);
        return $provincia->nombre;
    }

    public function provincia() {
        return $this->belongsTo(Provincium::class);
    }

    public function productores()
    {
        return $this->hasMany(Productor::class);
    }
}
