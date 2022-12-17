<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cerveza_id'), 'has-success': fields.cerveza_id && fields.cerveza_id.valid }">
    <label for="cerveza_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.favorito.columns.cerveza_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cerveza_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cerveza_id'), 'form-control-success': fields.cerveza_id && fields.cerveza_id.valid}" id="cerveza_id" name="cerveza_id" placeholder="{{ trans('admin.favorito.columns.cerveza_id') }}">
        <div v-if="errors.has('cerveza_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cerveza_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('user_id'), 'has-success': fields.user_id && fields.user_id.valid }">
    <label for="user_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.favorito.columns.user_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.user_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('user_id'), 'form-control-success': fields.user_id && fields.user_id.valid}" id="user_id" name="user_id" placeholder="{{ trans('admin.favorito.columns.user_id') }}">
        <div v-if="errors.has('user_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('user_id') }}</div>
    </div>
</div>


