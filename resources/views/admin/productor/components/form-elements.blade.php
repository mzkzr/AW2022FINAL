<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.productor.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('provincia_id'), 'has-success': this.fields.provincia_id && this.fields.provincia_id.valid }">
    <label for="provincia_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.provincia_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.provincia"
            :options="provincias"
            :multiple="false"
            track-by="id"
            label="nombre"
            tag-placeholder="{{ __('Seleccionar provincia') }}"
            placeholder="{{ __('Provincia') }}">
        </multiselect>
        <div v-if="errors.has('provincia_id')" class="form-control-feedback form-text" v-cloak>@{{errors.first('provincia_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localidad_id'), 'has-success': this.fields.localidad_id && this.fields.localidad_id.valid }">
    <label for="localidad_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.localidad_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.localidad"
            :options="localidades"
            :multiple="false"
            track-by="id"
            label="nombre"
            tag-placeholder="{{ __('Seleccionar localidad') }}"
            placeholder="{{ __('Localidad') }}">
        </multiselect>
        <div v-if="errors.has('localidad_id')" class="form-control-feedback form-text" v-cloak>@{{errors.first('localidad_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('domicilio'), 'has-success': fields.domicilio && fields.domicilio.valid }">
    <label for="domicilio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.domicilio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.domicilio" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('domicilio'), 'form-control-success': fields.domicilio && fields.domicilio.valid}" id="domicilio" name="domicilio" placeholder="{{ trans('admin.productor.columns.domicilio') }}">
        <div v-if="errors.has('domicilio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('domicilio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefono'), 'has-success': fields.telefono && fields.telefono.valid }">
    <label for="telefono" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.telefono') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefono" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefono'), 'form-control-success': fields.telefono && fields.telefono.valid}" id="telefono" name="telefono" placeholder="{{ trans('admin.productor.columns.telefono') }}">
        <div v-if="errors.has('telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefono') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.productor.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facebook'), 'has-success': fields.facebook && fields.facebook.valid }">
    <label for="facebook" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.facebook') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facebook" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facebook'), 'form-control-success': fields.facebook && fields.facebook.valid}" id="facebook" name="facebook" placeholder="{{ trans('admin.productor.columns.facebook') }}">
        <div v-if="errors.has('facebook')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('facebook') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('instagram'), 'has-success': fields.instagram && fields.instagram.valid }">
    <label for="instagram" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.instagram') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.instagram" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('instagram'), 'form-control-success': fields.instagram && fields.instagram.valid}" id="instagram" name="instagram" placeholder="{{ trans('admin.productor.columns.instagram') }}">
        <div v-if="errors.has('instagram')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('instagram') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('youtube'), 'has-success': fields.youtube && fields.youtube.valid }">
    <label for="youtube" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.youtube') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.youtube" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('youtube'), 'form-control-success': fields.youtube && fields.youtube.valid}" id="youtube" name="youtube" placeholder="{{ trans('admin.productor.columns.youtube') }}">
        <div v-if="errors.has('youtube')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('youtube') }}</div>
    </div>
</div>

@include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Productor::class)->getMediaCollection('gallery'),
    'media' => $productor->getThumbs200ForCollection('gallery'),
    'label' => 'Galería'
])