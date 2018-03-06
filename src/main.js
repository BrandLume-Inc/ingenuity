// import es6Promise from 'es6-promise';
// es6Promise.polyfill();
// import 'es6-promise/auto'
import store from './store'
import App from './App.vue'
var Promise = require('es6-promise').Promise;
require('es6-promise').polyfill();
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAnalytics from 'vue-analytics';
import axios from 'axios';
import VueAxios from 'vue-axios';
import { routes } from './routes';
var SocialSharing = require('vue-social-sharing');
Vue.use(SocialSharing);
Vue.use(VueRouter, VueAxios, axios);

// Vue.axios.defaults.headers.common['X-WP-Nonce'] = wp_api_vuejs_poc.nonce;

const router = new VueRouter({
	routes,
	mode: 'history',
	scrollBehavior (to, from, savedPosition) {
		if (to.hash) {
			console.log('HASH');
			return {
			  selector: to.hash
			  , offset: { x: 0, y: 100 }
			}
		} else {
			return { x: 0, y: 0 }
		}
	}
});

Vue.use(VueAnalytics, {
	id: 'UA-72042036-1',
	// commands: {
	// 	trackClick (name = 'unknown') {
	// 	   $ga.track('Social Link', 'click', 'Social Account', name)
	// 	}
	// }
	// debug: {
	// 	enabled: true,
	// 	trace: false,
	// 	sendHitTask: true
	// },
	router
});

new Vue({
	el: '#app',
	router,
	store,
  	render: h => h(App)
})
