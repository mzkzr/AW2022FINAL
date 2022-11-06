import AppForm from '../app-components/Form/AppForm';

Vue.component('provincium-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                
            }
        }
    }

});