import AppForm from '../app-components/Form/AppForm';

Vue.component('favorito-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                cerveza_id:  '' ,
                user_id:  '' ,
                
            }
        }
    }

});