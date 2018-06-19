import Vue from 'vue'
import App from './App'
import router from './router/router'
import store from './store/store'
import axios from './utils/http'

Vue.prototype.$ajax = axios
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
