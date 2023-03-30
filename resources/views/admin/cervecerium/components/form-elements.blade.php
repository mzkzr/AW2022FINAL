<div class="form-group row align-items-center" :class="{'has-danger': errors.has('domicilio'), 'has-success': fields.domicilio && fields.domicilio.valid }">
    <label for="domicilio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.domicilio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.domicilio" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('domicilio'), 'form-control-success': fields.domicilio && fields.domicilio.valid}" id="domicilio" name="domicilio" placeholder="{{ trans('admin.cervecerium.columns.domicilio') }}">
        <div v-if="errors.has('domicilio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('domicilio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('email'), 'has-success': fields.email && fields.email.valid }">
    <label for="email" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.email') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.email" v-validate="'email'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('email'), 'form-control-success': fields.email && fields.email.valid}" id="email" name="email" placeholder="{{ trans('admin.cervecerium.columns.email') }}">
        <div v-if="errors.has('email')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('email') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('facebook'), 'has-success': fields.facebook && fields.facebook.valid }">
    <label for="facebook" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.facebook') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.facebook" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('facebook'), 'form-control-success': fields.facebook && fields.facebook.valid}" id="facebook" name="facebook" placeholder="{{ trans('admin.cervecerium.columns.facebook') }}">
        <div v-if="errors.has('facebook')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('facebook') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('horario_atencion'), 'has-success': fields.horario_atencion && fields.horario_atencion.valid }">
    <label for="horario_atencion" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.horario_atencion') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.horario_atencion" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('horario_atencion'), 'form-control-success': fields.horario_atencion && fields.horario_atencion.valid}" id="horario_atencion" name="horario_atencion" placeholder="{{ trans('admin.cervecerium.columns.horario_atencion') }}">
        <div v-if="errors.has('horario_atencion')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('horario_atencion') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('instagram'), 'has-success': fields.instagram && fields.instagram.valid }">
    <label for="instagram" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.instagram') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.instagram" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('instagram'), 'form-control-success': fields.instagram && fields.instagram.valid}" id="instagram" name="instagram" placeholder="{{ trans('admin.cervecerium.columns.instagram') }}">
        <div v-if="errors.has('instagram')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('instagram') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('localidad_id'), 'has-success': fields.localidad_id && fields.localidad_id.valid }">
    <label for="localidad_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.localidad_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.localidad_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('localidad_id'), 'form-control-success': fields.localidad_id && fields.localidad_id.valid}" id="localidad_id" name="localidad_id" placeholder="{{ trans('admin.cervecerium.columns.localidad_id') }}">
        <div v-if="errors.has('localidad_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('localidad_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.cervecerium.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('productor_id'), 'has-success': fields.productor_id && fields.productor_id.valid }">
    <label for="productor_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.productor_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.productor_id" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('productor_id'), 'form-control-success': fields.productor_id && fields.productor_id.valid}" id="productor_id" name="productor_id" placeholder="{{ trans('admin.cervecerium.columns.productor_id') }}">
        <div v-if="errors.has('productor_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('productor_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('telefono'), 'has-success': fields.telefono && fields.telefono.valid }">
    <label for="telefono" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.telefono') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.telefono" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('telefono'), 'form-control-success': fields.telefono && fields.telefono.valid}" id="telefono" name="telefono" placeholder="{{ trans('admin.cervecerium.columns.telefono') }}">
        <div v-if="errors.has('telefono')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('telefono') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('youtube'), 'has-success': fields.youtube && fields.youtube.valid }">
    <label for="youtube" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.cervecerium.columns.youtube') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.youtube" v-validate="''" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('youtube'), 'form-control-success': fields.youtube && fields.youtube.valid}" id="youtube" name="youtube" placeholder="{{ trans('admin.cervecerium.columns.youtube') }}">
        <div v-if="errors.has('youtube')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('youtube') }}</div>
    </div>
</div>


