<template>
  <div class="login">
    <h1>Login</h1>
      <div class="content">
        <div id="image">
        </div>
        <div @submit.prevent="getUserCredentials" class="container">
          <form>
            <h6 style="color: red;">{{ this.$store.state.error }}</h6>
            <label for="email">Email: <br>
              <input type="text" id="email" v-model="form.email">
            </label>
            <label for="password">Password: <br>
              <input type="password" id="password" v-model="form.password">
            </label>
            <button type="submit">SIGN IN</button>
          </form>
        </div>
      </div>
  </div>
</template>

<script>
export default {
  name: "LoginView",
  data: function (){
    return {
      form: {
        email: "",
        password: ""
      }
    }
  },
  methods: {
    getUserCredentials: function (){
      this.$store.dispatch('login', this.form).then(()=>{
        if(this.$store.state.userToken != null) {
          this.$router.push('/')
        }
      })
    }
  }
}
</script>

<style scoped>

h1 {
  text-align: left;
}

.content {
  margin-left: auto;
  margin-right: auto;
  margin-top: 2%;
  display: flex;
  max-width: 100%;
  gap: 6%;
}

.container {
  display: flex;
  width: 50%;
  align-items: center;
}

.container > form {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  gap: 20px;
}

#image {
  background-color: #cfcfcf;
  border-radius: 1px;
  box-shadow: 1px 7px 43px -15px rgba(0,0,0,0.78);
  -webkit-box-shadow: 1px 7px 43px -15px rgba(0,0,0,0.78);
  -moz-box-shadow: 1px 7px 43px -15px rgba(0,0,0,0.78);
  height: 400px;
  width: 50%;
}

form > label > input {
  padding: 5%;
  border-radius: 7px;
  border: none;
  outline: none;
  background-color: #f0f0f0;
  color: black;
  font-size: 15px;
}

form > button {
  border: none;
  outline: none;
  background-color: #6e6e6e;
  color: white;
  border-radius: 4px;
  padding: 8%;
  letter-spacing: 0.2%;
}

form > label {
  text-align: left;
  font-size: 12px;
}

</style>
