<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cervecerium extends Model
{
    protected $fillable = [
        'domicilio',
        'email',
        'horario_atencion',
        'localidad_id',
        'nombre',
        'productor_id',
        'telefono'
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
}
