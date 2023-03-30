@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.localidad.actions.edit', ['name' => $localidad->nombre]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <localidad-form
                :action="'{{ $localidad->resource_url }}'"
                :data="{{ $localidad->toJson() }}"
                :provincias="{{ $provincias->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.localidad.actions.edit', ['name' => $localidad->nombre]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.localidad.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </localidad-form>

        </div>
    
</div>

@endsection