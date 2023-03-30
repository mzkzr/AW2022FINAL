import AppForm from '../app-components/Form/AppForm';

Vue.component('localidad-form', {
    mixins: [AppForm],
    props: ['provincias'],
    data: function() {
        return {
            form: {
                provincia_id:  '',
                provincia:  '',
                nombre:  ''
            }
        }
    }
});