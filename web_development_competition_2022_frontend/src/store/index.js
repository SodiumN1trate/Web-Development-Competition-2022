import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'


Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    error: null,
    userToken: localStorage.getItem('token') || null
  },
  getters: {

  },
  mutations: {
    set_error: function (state, err) {
      state.error = err
    },
    set_user_token: function (state, token) {
      state.userToken = token
    }
  },
  actions: {
    login: function (context, form) {
      return new Promise((resolve, reject) => {
        axios.post('http://127.0.0.1:8000/api/login', form).then((response) => {
          if(response.data.user){
            localStorage.setItem('token', response.data.access_token)
            context.commit('set_user_token', response.data.access_token)
          } else {
            context.commit('set_error', response.data.message)
          }
          resolve(response)
        }).catch((err) => {
          context.commit('set_error', err.response.data.message)
          reject(err)
        })
      })
    },
    logout: function (context) {
      return new Promise((resolve) => {
        console.log(process.env.VUE_APP_SERVER_HOST)
        axios.post(process.env.VUE_APP_SERVER_HOST+'logout', {}, { headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_error_message', response.data.message)
          localStorage.removeItem('token')
          resolve(response)
        })
      })
    }
  },
  modules: {

  }
})
