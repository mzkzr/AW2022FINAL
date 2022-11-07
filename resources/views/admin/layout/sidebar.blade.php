<style>
    .items_navbar i {
        color: white !important;
    }
</style>
<div class="sidebar">
    <nav class="sidebar-nav" style="background-color:#23540e">
        <ul class="nav items_navbar">
            <li class="nav-title"><!--{{ trans('brackets/admin-ui::admin.sidebar.content') }}-->Contenido</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/provincia') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.provincium.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/localidads') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.localidad.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/productors') }}"><i class="nav-icon icon-energy"></i> {{ trans('admin.productor.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/cervezas') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.cerveza.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/cerveceria') }}"><i class="nav-icon icon-flag"></i> {{ trans('admin.cervecerium.title') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/punto-venta') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.punto-ventum.title') }}</a></li>
            {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title"><!--{{ trans('brackets/admin-ui::admin.sidebar.settings') }}-->Configuraciones</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Administrar acceso') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Traducciones') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuración') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button" style="background-color:#133306"></button>
</div>
