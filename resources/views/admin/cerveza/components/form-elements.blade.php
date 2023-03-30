<div class="form-group row align-items-center" :class="{'has-danger': errors.has('abv'), 'has-success': fields.abv && fields.abv.valid }">
    <label for="abv" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.abv') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.abv" v-validate="'decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('abv'), 'form-control-success': fields.abv && fields.abv.valid}" id="abv" name="abv" placeholder="{{ trans('admin.cerveza.columns.abv') }}">
        <div v-if="errors.has('abv')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('abv') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('descripcion'), 'has-success': fields.descripcion && fields.descripcion.valid }">
    <label for="descripcion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.descripcion') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div>
            <textarea class="form-control" v-model="form.descripcion" v-validate="''" id="descripcion" name="descripcion"></textarea>
        </div>
        <div v-if="errors.has('descripcion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('descripcion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ibu'), 'has-success': fields.ibu && fields.ibu.valid }">
    <label for="ibu" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.ibu') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ibu" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ibu'), 'form-control-success': fields.ibu && fields.ibu.valid}" id="ibu" name="ibu" placeholder="{{ trans('admin.cerveza.columns.ibu') }}">
        <div v-if="errors.has('ibu')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ibu') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.cerveza.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('og'), 'has-success': fields.og && fields.og.valid }">
    <label for="og" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.og') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.og" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('og'), 'form-control-success': fields.og && fields.og.valid}" id="og" name="og" placeholder="{{ trans('admin.cerveza.columns.og') }}">
        <div v-if="errors.has('og')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('og') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('productor_id'), 'has-success': fields.productor_id && fields.productor_id.valid }">
    <label for="productor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.productor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.productor_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('productor_id'), 'form-control-success': fields.productor_id && fields.productor_id.valid}" id="productor_id" name="productor_id" placeholder="{{ trans('admin.cerveza.columns.productor_id') }}">
        <div v-if="errors.has('productor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('productor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('srm'), 'has-success': fields.srm && fields.srm.valid }">
    <label for="srm" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cerveza.columns.srm') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.srm" v-validate="'integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('srm'), 'form-control-success': fields.srm && fields.srm.valid}" id="srm" name="srm" placeholder="{{ trans('admin.cerveza.columns.srm') }}">
        <div v-if="errors.has('srm')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('srm') }}</div>
    </div>
</div>


