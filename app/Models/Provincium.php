<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provincium extends Model
{
    protected $fillable = [
        'nombre'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/provincia/'.$this->getKey());
    }

    public function localidades()
    {
        return $this->hasMany(Localidad::class);
    }

    public function productores()
    {
        return $this->hasMany(Productor::class);
    }

    public function cervecerias()
    {
        return $this->hasMany(Cervecerium::class);
    }
}
