<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Productor extends Model
{
    protected $table = 'productor';

    protected $fillable = [
        'domicilio',
        'email',
        'facebook',
        'instagram',
        'localidad_id',
        'nombre',
        'provincia_id',
        'telefono',
        'youtube',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/productors/'.$this->getKey());
    }
}
