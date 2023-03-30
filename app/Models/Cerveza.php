<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cerveza extends Model
{
    protected $table = 'cerveza';

    protected $fillable = [
        'abv',
        'descripcion',
        'ibu',
        'nombre',
        'og',
        'productor_id',
        'srm',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute()
    {
        return url('/admin/cervezas/'.$this->getKey());
    }
}
