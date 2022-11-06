@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cerveza.actions.edit', ['name' => $cerveza->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cerveza-form
                :action="'{{ $cerveza->resource_url }}'"
                :data="{{ $cerveza->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cerveza.actions.edit', ['name' => $cerveza->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cerveza.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </cerveza-form>

        </div>
    
</div>

@endsection