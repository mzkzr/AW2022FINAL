import AppForm from '../app-components/Form/AppForm';

Vue.component('productor-form', {
    mixins: [AppForm],
    props: ['provincias', 'localidades'],
    data: function() {
        return {
            form: {
                domicilio:  '' ,
                email:  '' ,
                facebook:  '' ,
                instagram:  '' ,
                provincia_id:  '' ,
                provincia:  '',
                localidad_id:  '' ,
                nombre:  '' ,
                telefono:  '' ,
                youtube:  ''
            },
            mediaCollections: ['gallery_productor']
        }
    }
});