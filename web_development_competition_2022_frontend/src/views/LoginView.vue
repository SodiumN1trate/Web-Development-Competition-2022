<template>
  <div class="login">
    <h1>Login</h1>
      <div class="content">
        <div id="image">
        </div>
        <div class="container">
          <form>
            <label for="email">Email: <br>
              <input type="text" id="email">
            </label>
            <label for="password">Password: <br>
              <input type="password" id="password">
            </label>
            <button type="submit">SIGN IN</button>
          </form>
        </div>
      </div>
  </div>
</template>


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

</style>