import AppForm from '../app-components/Form/AppForm';

Vue.component('productor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                cuit:  '' ,
                provincia_id:  '' ,
                localidad_id:  '' ,
                domicilio:  '' 
            }
        }
    }
});