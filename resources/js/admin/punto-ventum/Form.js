import AppForm from '../app-components/Form/AppForm';

Vue.component('punto-ventum-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cerveza_id:  '' ,
                cerveceria_id:  '' ,
                
            }
        }
    }

});