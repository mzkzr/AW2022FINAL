import AppForm from '../app-components/Form/AppForm';

Vue.component('cervecerium-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                domicilio:  '' ,
                email:  '' ,
                horario_atencion:  '' ,
                localidad_id:  '' ,
                nombre:  '' ,
                productor_id:  '' ,
                telefono:  '' 
            }
        }
    }

});