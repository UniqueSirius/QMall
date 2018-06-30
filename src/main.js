import Vue from 'vue'
import App from './App'
import router from './router/router'
import store from './store/store'
import axios from './utils/http'
import service from './utils/service'

// import { Loading } from 'element-ui'
// Vue.prototype.$loading = Loading.service

Vue.prototype.$ajax = axios
Vue.prototype.$service = service
Vue.config.productionTip = false

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  store,
  components: { App },
  template: '<App/>'
})
