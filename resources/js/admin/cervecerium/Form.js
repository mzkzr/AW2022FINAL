import AppForm from '../app-components/Form/AppForm';

Vue.component('cervecerium-form', {
    mixins: [AppForm],
    props: ['provincias', 'localidades', 'productores'],
    data: function() {
        return {
            form: {
                domicilio:  '' ,
                email:  '' ,
                facebook:  '' ,
                horario_atencion:  '' ,
                instagram:  '' ,
                localidad_id:  '' ,
                localidad:  '',
                nombre:  '' ,
                productor_id:  '' ,
                productor:  '',
                provincia_id:  '' ,
                provincia:  '',
                telefono:  '' ,
                youtube:  '' 
            },
            mediaCollections: ['gallery_cerveceria']
        }
    }
});