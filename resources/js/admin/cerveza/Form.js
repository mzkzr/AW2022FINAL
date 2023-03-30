import AppForm from '../app-components/Form/AppForm';

Vue.component('cerveza-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                abv:  '' ,
                descripcion:  '' ,
                ibu:  '' ,
                imagen:  '' ,
                nombre:  '' ,
                og:  '' ,
                productor_id:  '' ,
                srm:  '' ,
                
            }
        }
    }

});