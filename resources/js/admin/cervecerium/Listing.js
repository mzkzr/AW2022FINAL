import AppListing from '../app-components/Listing/AppListing';

Vue.component('cervecerium-listing', {
    mixins: [AppListing],
    data() {
        return {
            showProvinciasFilter: false,
            provinciasMultiselect: {},
            showLocalidadesFilter: false,
            localidadesMultiselect: {},
            showProductoresFilter: false,
            productoresMultiselect: {},
            filters: {
                provincias: [],
                localidades: [],
                productores: []
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
        },
        showProductoresFilter: function (newVal, oldVal) {
            this.productoresMultiselect = [];
        },
        productoresMultiselect: function(newVal, oldVal) {
            this.filters.productores = newVal.map(function(object) { return object['key']; });
            this.filter('productores', this.filters.productores);
        }
    }
});