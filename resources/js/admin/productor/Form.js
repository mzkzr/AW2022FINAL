import AppForm from '../app-components/Form/AppForm';

Vue.component('productor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                domicilio:  '' ,
                email:  '' ,
                facebook:  '' ,
                instagram:  '' ,
                localidad_id:  '' ,
                nombre:  '' ,
                provincia_id:  '' ,
                telefono:  '' ,
                youtube:  '' ,
                
            }
        }
    }

});