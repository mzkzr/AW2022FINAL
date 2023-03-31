import AppListing from '../app-components/Listing/AppListing';

Vue.component('punto-ventum-listing', {
    mixins: [AppListing],
    data() {
        return {
            showCervezasFilter: false,
            cervezasMultiselect: {},
            showCerveceriasFilter: false,
            cerveceriasMultiselect: {},
            filters: {
                cervezas: [],
                cervecerias: []
            },
        }
    },
    watch: {
        showCervezasFilter: function (newVal, oldVal) {
            this.cervezasMultiselect = [];
        },
        cervezasMultiselect: function(newVal, oldVal) {
            this.filters.cervezas = newVal.map(function(object) { return object['key']; });
            this.filter('cervezas', this.filters.cervezas);
        },
        showCerveceriasFilter: function (newVal, oldVal) {
            this.cerveceriasMultiselect = [];
        },
        cerveceriasMultiselect: function(newVal, oldVal) {
            this.filters.cervecerias = newVal.map(function(object) { return object['key']; });
            this.filter('cervecerias', this.filters.cervecerias);
        }
    }
});