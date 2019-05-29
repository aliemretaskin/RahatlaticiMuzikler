import Vue from 'vue'
import VueResource from 'vue-resource'
import VueLazyload from 'vue-lazyload'

import App from './App'
import store from './store'
import router from './router'
import _ from 'lodash'
import Element from 'element-ui'

import 'element-ui/lib/theme-chalk/index.css';

window.axios = require('axios');

Vue.config.productionTip = false;
Vue.config.silent = true;

Vue.use(Element);
Vue.use(VueResource);
Vue.use(VueLazyload, {
    error: require('./assets/loading.svg'),
    loading: require('./assets/loading.svg'),
    attempt: 1
  }
)

Vue.prototype._ = _;

/* eslint-disable no-new */
new Vue({
  el: '#app',
  store,
  router,
  render: h => h(App)
})
