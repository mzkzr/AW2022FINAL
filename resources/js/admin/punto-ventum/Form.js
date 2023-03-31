import AppForm from '../app-components/Form/AppForm';

Vue.component('punto-ventum-form', {
    mixins: [AppForm],
    props: ['cervezas', 'cervecerias'],
    data: function() {
        return {
            form: {
                cerveza_id:  '' ,
                cerveza:  '' ,
                cerveceria_id:  '' ,
                cerveceria:  '' ,
                presentaciones:  '' 
            }
        }
    }
});