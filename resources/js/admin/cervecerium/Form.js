import AppForm from '../app-components/Form/AppForm';

Vue.component('cervecerium-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cuit:  '' ,
                domicilio:  '' ,
                localidad_id:  '' ,
                nombre:  '' ,
                provincia_id:  '' ,
                horario_atencion:  ''
            }
        }
    }

});