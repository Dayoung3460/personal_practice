import '@babel/polyfill'
import Vue from 'vue'
import './plugins/vuetify'
import App from './App.vue'
// import router from './router'
// import store from './store'

Vue.config.productionTip = false

// eventBus상수 내보내기
// 새로운 뷰 인스턴스를 생성해서 내보냄.
export const eventBus = new Vue({
  methods: {
    userWasEdited(date) {
      this.$emit('userWasEdited', date)
    }
  }
})

new Vue({
  // router,
  // store,
  render: h => h(App)
}).$mount('#app')
