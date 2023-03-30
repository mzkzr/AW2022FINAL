import AppForm from '../app-components/Form/AppForm';

Vue.component('localidad-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                provincia_id:  '',
                nombre:  '',
            }
        }
    }
});