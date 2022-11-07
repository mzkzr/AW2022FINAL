<div class="form-group row align-items-center" :class="{'has-danger': errors.has('provincia_id'), 'has-success': fields.provincia_id && fields.provincia_id.valid }">
    <label for="provincia_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.localidad.columns.provincia_id') }}</label>
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

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.localidad.columns.nombre') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.localidad.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>