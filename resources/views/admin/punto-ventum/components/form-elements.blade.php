<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cerveceria_id'), 'has-success': fields.cerveceria_id && fields.cerveceria_id.valid }">
    <label for="cerveceria_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.punto-ventum.columns.cerveceria_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.cerveceria_id" id="cerveceria_id" name="cerveceria_id" class="form-control" :class="{'form-control-danger': errors.has('cerveceria_id'), 'form-control-success': fields.cerveceria_id && fields.cerveceria_id.valid}">
            <option value="">Seleccione una cerveceria</option>
            @foreach ($cervecerias as $cerveceria)
                <option value="{{$cerveceria->id}}">{{$cerveceria->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('cerveceria_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cerveceria_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cerveza_id'), 'has-success': fields.cerveza_id && fields.cerveza_id.valid }">
    <label for="cerveza_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.punto-ventum.columns.cerveza_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <select v-model="form.cerveza_id" id="cerveza_id" name="cerveza_id" class="form-control" :class="{'form-control-danger': errors.has('cerveza_id'), 'form-control-success': fields.cerveza_id && fields.cerveza_id.valid}">
            <option value="">Seleccione una cerveza</option>
            @foreach ($cervezas as $cerveza)
                <option value="{{$cerveza->id}}">{{$cerveza->nombre}}</option>
            @endforeach
        </select>
        <div v-if="errors.has('cerveza_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cerveza_id') }}</div>
    </div>
</div>