import AppListing from '../app-components/Listing/AppListing';

Vue.component('productor-listing', {
    mixins: [AppListing],
    data() {
        return {
            showProvinciasFilter: false,
            provinciasMultiselect: {},
            showLocalidadesFilter: false,
            localidadesMultiselect: {},
            filters: {
                provincias: [],
                localidades: []
            },
        }
    },
    watch: {
        showProvinciasFilter: function (newVal, oldVal) {
            this.provinciasMultiselect = [];
        },
        provinciasMultiselect: function(newVal, oldVal) {
            this.filters.provincias = newVal.map(function(object) { return object['key']; });
            this.filter('provincias', this.filters.provincias);
        },
        showLocalidadesFilter: function (newVal, oldVal) {
            this.localidadesMultiselect = [];
        },
        localidadesMultiselect: function(newVal, oldVal) {
            this.filters.localidades = newVal.map(function(object) { return object['key']; });
            this.filter('localidades', this.filters.localidades);
        }
    }
});