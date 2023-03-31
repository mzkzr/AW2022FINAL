<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Brackets\Media\HasMedia\ProcessMediaTrait;
use Brackets\Media\HasMedia\AutoProcessMediaTrait;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\HasMedia;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;

class Productor extends Model implements HasMedia
{
    use ProcessMediaTrait;
    use AutoProcessMediaTrait;
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;

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
        'youtube'
    ];
    
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
    protected $appends = ['provincia', 'localidad', 'resource_url', 'media_urls'];

    /* ************************** MEDIA ************************** */

    public function registerMediaCollections(): void {
        $this->addMediaCollection('gallery_productor')
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

    public function cervezas()
    {
        return $this->hasMany(Cerveza::class);
    }

    public function cervecerias()
    {
        return $this->hasMany(Cervecerium::class);
    }
}