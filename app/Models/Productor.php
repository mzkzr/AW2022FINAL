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
    
    protected $appends = ['resource_url'];

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