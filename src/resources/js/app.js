
import './bootstrap'
import Vue from 'vue'
import ArticleLike from './components/ArticleLike'
import BootstrapVue from 'bootstrap-vue'
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
Vue.use(BootstrapVue)

const app = new Vue({
    el: '#app',
    components: {
        ArticleLike,
    }
})
