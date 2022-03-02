<template>
  <div class="login">
    <h1>Login</h1>
      <div class="content">
        <div id="image">

        </div>
        <form class="container">
            <input type="text">
            <input type="text">
            <button>SIGN IN</button>
        </form>
      </div>
  </div>
</template>


<style scoped>
.content {
  display: flex;
}

.container {
  display: flex;
  flex-direction: column;
  gap: 10px;
}

#image {
  background-color: gray;
  height: 400px;
}
</style>