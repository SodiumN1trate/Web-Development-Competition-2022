<template>
  <div class="home">
    <HeaderComponent />
    <div id="content">
        <div id="sidebar">
            <div class="sidebar-block">
              Tests  
            </div>
        </div>
        <div id="main">
        tests
        </div>
    </div>  
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderComponent from '../components/Header.vue'
export default {
  name: 'HomeView',
  components: {
    HeaderComponent
  }
}
</script>

<style scoped>

.home {
  background-color: #e8e8e8;
  height: 100%;
}

#content {
  max-width: 1500px;
  width: 100%;
  display: flex;
  justify-content: center;
  gap: 2%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 5%;
}

#sidebar{
  width: 30%;
  height: 500px;
}

#main{
  width: 70%;
  height: 500px;
}

.sidebar-block {
  background-color: ;
}

</style>