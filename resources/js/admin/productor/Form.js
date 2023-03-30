import AppForm from '../app-components/Form/AppForm';

Vue.component('productor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                domicilio:  '' ,
                email:  '' ,
                localidad_id:  '' ,
                nombre:  '' ,
                telefono:  ''
            },
            mediaCollections: ['gallery']
        }
    }
});