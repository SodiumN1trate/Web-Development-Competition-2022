import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'


Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    error: null,
    userToken: localStorage.getItem('token') || null,
    name: ""
  },
  getters: {

  },
  mutations: {
    set_error: function (state, err) {
      state.error = err
    },
    set_user_token: function (state, token) {
      state.userToken = token
    },
    set_user_name: function (state, name) {
      state.name = name
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
        axios.post(process.env.VUE_APP_SERVER_HOST+'logout', {}, { headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_error_message', response.data.message)
          localStorage.removeItem('token')
          resolve(response)
        })
      })
    },
    add_task: function (context, form) {
      return new Promise((resolve) => {
        axios.post(process.env.VUE_APP_SERVER_HOST+'tasks', form, {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          console.log(response)
          resolve(response)
        })
      })
    },
    get_user: function (context) {
      return new Promise((resolve, reject) => {
        axios.get(process.env.VUE_APP_SERVER_HOST+'user', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          if(response.data.user) {
            context.commit('set_user_name', response.data.user.name)
          }
        }).catch((error) => {
          if(error.response){
            localStorage.removeItem('token')
            context.commit('set_user_token', null)
            reject(error)
          }
        })
      })
    }
  },
  modules: {

  }
})
