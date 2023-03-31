@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.cervecerium.actions.edit', ['name' => $cervecerium->email]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <cervecerium-form
                :action="'{{ $cervecerium->resource_url }}'"
                :data="{{ $cervecerium->toJson() }}"
                :provincias="{{ $provincias->toJson() }}"
                :localidades="{{ $localidades->toJson() }}"
                :productores="{{ $productores->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.cervecerium.actions.edit', ['name' => $cervecerium->email]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.cervecerium.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </cervecerium-form>

        </div>
    
</div>

@endsection