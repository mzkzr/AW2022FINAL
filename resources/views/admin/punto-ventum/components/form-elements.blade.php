<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cerveza_id'), 'has-success': this.fields.cerveza_id && this.fields.cerveza_id.valid }">
    <label for="cerveza_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.punto_venta.columns.cerveza_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cerveza"
            :options="cervezas"
            :multiple="false"
            track-by="id"
            label="nombre"
            tag-placeholder="{{ __('Seleccionar provincia') }}"
            placeholder="{{ __('Provincia') }}">
        </multiselect>
        <div v-if="errors.has('cerveza_id')" class="form-control-feedback form-text" v-cloak>@{{errors.first('cerveza_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cerveceria_id'), 'has-success': this.fields.cerveceria_id && this.fields.cerveceria_id.valid }">
    <label for="cerveceria_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.punto_venta.columns.cerveceria_id') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <multiselect
            v-model="form.cerveceria"
            :options="cervecerias"
            :multiple="false"
            track-by="id"
            label="nombre"
            tag-placeholder="{{ __('Seleccionar cervecería') }}"
            placeholder="{{ __('Cervecería') }}">
        </multiselect>
        <div v-if="errors.has('cerveceria_id')" class="form-control-feedback form-text" v-cloak>@{{errors.first('cerveceria_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('presentaciones'), 'has-success': fields.presentaciones && fields.presentaciones.valid }">
    <label for="presentaciones" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.punto-ventum.columns.presentaciones') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.presentaciones" v-validate="''" id="presentaciones" name="presentaciones"></textarea>
        </div>
        <div v-if="errors.has('presentaciones')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('presentaciones') }}</div>
    </div>
</div>


