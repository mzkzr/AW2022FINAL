import AppListing from '../app-components/Listing/AppListing';

Vue.component('localidad-listing', {
    mixins: [AppListing],
    data() {
        return {
            showProvinciasFilter: false,
            provinciasMultiselect: {},
            filters: {
                provincias: []
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
        }
    }
});
