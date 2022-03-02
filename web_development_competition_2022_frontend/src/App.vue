<template>
  <div id="app">
    <router-view/>
  </div>
</template>


<style>

body {
  margin: 0;
}

#app {
  width: 100%;
  font-family: Arial;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #000;
  margin-left: auto;
  margin-right: auto;
}

h1 {
  font-weight: 200;
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
