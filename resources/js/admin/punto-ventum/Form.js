import AppForm from '../app-components/Form/AppForm';

Vue.component('punto-ventum-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cerveceria_id:  '' ,
                cerveza_id:  '' ,
                presentaciones:  '' ,
                
            }
        }
    }

});