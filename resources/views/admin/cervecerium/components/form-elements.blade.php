<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.cervecerium.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cuit'), 'has-success': fields.cuit && fields.cuit.valid }">
    <label for="cuit" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.cuit') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cuit" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cuit'), 'form-control-success': fields.cuit && fields.cuit.valid}" id="cuit" name="cuit" placeholder="{{ trans('admin.cervecerium.columns.cuit') }}">
        <div v-if="errors.has('cuit')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cuit') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('provincia_id'), 'has-success': fields.provincia_id && fields.provincia_id.valid }">
    <label for="provincia_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.provincia_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.provincia_id" id="provincia_id" name="provincia_id" class="form-control" :class="{'form-control-danger': errors.has('provincia_id'), 'form-control-success': fields.provincia_id && fields.provincia_id.valid}">
            <option value="">Seleccione una provincia</option>
            @foreach ($provincias as $provincia)
                <option value="{{$provincia->id}}">{{$provincia->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('provincia_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('provincia_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localidad_id'), 'has-success': fields.localidad_id && fields.localidad_id.valid }">
    <label for="localidad_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.localidad_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.localidad_id" id="localidad_id" name="localidad_id" class="form-control" :class="{'form-control-danger': errors.has('localidad_id'), 'form-control-success': fields.localidad_id && fields.localidad_id.valid}">
            <option value="">Seleccione una localidad</option>
            @foreach ($localidades as $localidad)
                <option value="{{$localidad->id}}">{{$localidad->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('localidad_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('localidad_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('domicilio'), 'has-success': fields.domicilio && fields.domicilio.valid }">
    <label for="domicilio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.domicilio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.domicilio" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('domicilio'), 'form-control-success': fields.domicilio && fields.domicilio.valid}" id="domicilio" name="domicilio" placeholder="{{ trans('admin.cervecerium.columns.domicilio') }}">
        <div v-if="errors.has('domicilio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('domicilio') }}</div>
    </div>
</div>


