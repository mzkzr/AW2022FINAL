<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Cervecerium extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

    protected $fillable = [
        'domicilio',
        'email',
        'facebook',
        'horario_atencion',
        'instagram',
        'localidad_id',
        'nombre',
        'productor_id',
        'provincia_id',
        'telefono',
        'youtube',
    
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at',
    
    ];
    
    protected $appends = ['resource_url'];

    /* ************************** MEDIA ************************** */

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery_cerveceria')
            ->accepts('image/*')
            ->maxNumberOfFiles(20);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->autoRegisterThumb200();
    }

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

    public function productor() {
        return $this->belongsTo(Productor::class);
    }

    public function punto_venta()
    {
        return $this->hasMany(PuntoVentum::class);
    }
}
