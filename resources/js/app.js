require('./bootstrap');

import Vue from 'vue';
import Vuex from 'vuex';
import VueRouter from 'vue-router';
import { routes } from './routes';
import StoreDate from './store';
import App from './views/App';
import Loader from './components/Loader';
import { TransMixin  } from "./trans";

Vue.mixin(TransMixin);

Vue.use(VueRouter);
Vue.use(Vuex);

Vue.component('Loader', Loader);

const store = new Vuex.Store(StoreDate);

const router = new VueRouter({
    routes,
    mode: 'history'
});

const app = new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
