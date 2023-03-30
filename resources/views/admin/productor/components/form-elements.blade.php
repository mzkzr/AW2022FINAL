<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.productor.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('provincia_id'), 'has-success': fields.provincia_id && fields.provincia_id.valid }">
    <label for="provincia_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.provincia_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select id="provincia_id" name="provincia_id" class="form-control" :class="{'form-control-danger': errors.has('provincia_id'), 'form-control-success': fields.provincia_id && fields.provincia_id.valid}">
            <option value="">Seleccione una provincia</option>
            @foreach ($provincias as $provincia)
                <option @selected($provincia_id) value="{{$provincia->id}}">{{$provincia->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('provincia_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('provincia_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localidad_id'), 'has-success': fields.localidad_id && fields.localidad_id.valid }">
    <label for="localidad_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.productor.columns.localidad_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.localidad_id" id="localidad_id" name="localidad_id" class="form-control" :class="{'form-control-danger': errors.has('localidad_id'), 'form-control-success': fields.localidad_id && fields.localidad_id.valid}">
            <option value="">Seleccione una localidad</option>
            @foreach ($localidades as $localidad)
                <option @selected('admin.productor.columns.localidad_id') value="{{$localidad->id}}">{{$localidad->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('localidad_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('localidad_id') }}</div>
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

<div>URL: {{ $media_url }}</div>

@include('brackets/admin-ui::admin.includes.media-uploader', [
    'mediaCollection' => app(App\Models\Productor::class)->getMediaCollection('gallery'),
    'media' => $productor->getThumbs200ForCollection('gallery'),
    'label' => 'Galería'
])

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#provincia_id').on('change', function () {
            if (this.value) {
                $('#localidad_id').html('<option value="">Seleccione una localidad</option>');
                $.get('/api/localidades?id_localidad='+this.value, function(response) {
                    response.data.forEach(loc => {
                        $('#localidad_id').append(`<option value="${loc.id}">${loc.nombre}</option>`)
                    })
                    $('#localidad_id').prop('disabled', false)
                })
            } else {
                $('#localidad_id').html('<option value="">Seleccione una localidad</option>').prop('disabled', true)
            }
        })
    })
</script>