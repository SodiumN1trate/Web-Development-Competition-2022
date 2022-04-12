import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'



Vue.use(Vuex)

export default new Vuex.Store({
  state: {
    error: null,
    userToken: localStorage.getItem('token') || null,
    name: "",
    tasks: [],
    categoriesCount: [],
    categoriesTime: [],
    hours: null
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
    },
    set_user_tasks: function (state, tasks) {
      state.tasks = tasks
    },
    set_task_hours: function (state, hours) {
      state.hours = hours;
    },
    set_categories_count: function (state, count) {
      state.categoriesCount = count
    },
    set_categories_time: function (state, time) {
      state.categoriesTime = time
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
    add_task: function (context, data) {
      return new Promise((resolve) => {
        axios.post(process.env.VUE_APP_SERVER_HOST+'tasks', data.form, {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          data.tags.forEach((tag) => {
            tag['task_id'] = response.data.data.id
            axios.post(process.env.VUE_APP_SERVER_HOST+'tags', tag, {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then(() => {
              console.log("Sent!")
            })
          })
        })

        resolve(true)

      })
    },
    get_user: function (context) {
      return new Promise((resolve, reject) => {
        axios.get(process.env.VUE_APP_SERVER_HOST+'user', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          if(response.data.id) {
            context.commit('set_user_name', response.data.name)
          }
          // console.log(context.state.userId)
          resolve(response)
        }).catch((error) => {
          if(error.response){
            localStorage.removeItem('token')
            context.commit('set_user_token', null)
            reject(error)
          }
        })
      })
    },
    get_tasks: function (context) {
      return new Promise((resolve) => {
        axios.get(process.env.VUE_APP_SERVER_HOST + 'tasks', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_user_tasks', response.data.data)
          resolve(response)
        })
      })
    },

    get_hours: function (context) {
      return new Promise((resolve) => {
        axios.get(process.env.VUE_APP_SERVER_HOST + 'tasks/get_hours', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_task_hours', response.data.hours)
          resolve(response)
        })
      })
    },

    filter_tasks_by_category: function (context) {
      return new Promise((resolve) => {
        axios.get(process.env.VUE_APP_SERVER_HOST + 'tasks/filter_tasks_by_category', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_categories_count', response.data)
          resolve(response)
        })
      })
    },
    filter_tasks_by_category_time: function (context) {
      return new Promise((resolve) => {
        axios.get(process.env.VUE_APP_SERVER_HOST + 'tasks/filter_tasks_by_category_time', {headers: {"Authorization": `Bearer ${this.state.userToken}`}}).then((response) => {
          context.commit('set_categories_time', response.data)
          resolve(response)
        })
      })
    }
  },
  modules: {

  }
})
