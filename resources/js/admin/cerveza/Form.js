import AppForm from '../app-components/Form/AppForm';

Vue.component('cerveza-form', {
    mixins: [AppForm],
    props: ['productores'],
    data: function() {
        return {
            form: {
                abv:  '' ,
                descripcion:  '' ,
                ibu:  '' ,
                nombre:  '' ,
                og:  '' ,
                productor_id:  '' ,
                productor:  '',
                srm:  '' 
            },
            mediaCollections: ['gallery_cerveza']
        }
    }

});