import AppListing from '../app-components/Listing/AppListing';

Vue.component('cerveza-listing', {
    mixins: [AppListing],
    data() {
        return {
            showProductoresFilter: false,
            productoresMultiselect: {},
            filters: {
                productores: []
            },
        }
    },
    watch: {
        showProductoresFilter: function (newVal, oldVal) {
            this.productoresMultiselect = [];
        },
        productoresMultiselect: function(newVal, oldVal) {
            this.filters.productores = newVal.map(function(object) { return object['key']; });
            this.filter('productores', this.filters.productores);
        }
    }
});