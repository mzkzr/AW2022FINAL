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
        'youtube'
    ];
    
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['provincia', 'localidad', 'productor', 'resource_url', 'media_urls'];

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

    public function getProductorAttribute()
    {
        $productor = Productor::find($this->productor_id);
        return $productor->nombre;
    }

    public function getMediaUrlsAttribute() {
        $mediaItems = $this->getMedia();

        $mediaUrls = $mediaItems->map(function (Media $media) {
            return $media->getFullUrl();
        });

        return $mediaUrls;
    }

    /* *********************** RELACIONES ************************ */

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
