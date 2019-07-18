Nova.booting((Vue, router, store) => {
    Vue.component('index-external-url-validator', require('./components/IndexField'))
    Vue.component('detail-external-url-validator', require('./components/DetailField'))
	Vue.component('form-external-url-validator', require('./components/FormField'))
	Vue.mixin(require('./translation'))
})
