<template>
  <div class="home">
    <HeaderComponent />
    <div id="content">
        <!-- <SidebarComponent /> -->
        <div id="sidebar">

          <div class="sidebar-block">
              <div class="sidebar-content">
                <h2 class="sidebar-block-title" >Logged working hours</h2>
                <div id="time-block">

                    <div>
                      <h2 class="time-block-h2">15,5 h</h2>
                      <p class="time-block-p">Total</p>
                    </div>
                
                    <div>
                      <h2 class="time-block-h2">13,5 h</h2>
                      <p class="time-block-p">Last month</p>
                    </div>
                
                </div>
              </div>
          </div>

          

        </div>

        <div id="main">
          Te biju es
        </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderComponent from '../components/Header.vue'
// import SidebarComponent from '../components/Sidebar.vue'
export default {
  name: 'HomeView',
  components: {
    HeaderComponent
    // SidebarComponent
  }
}
</script>

<style scoped>

h2, p {
  margin: 0;
  font-weight: 200;
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

#main{
  width: 70%;
  height: 500px;
  background-color: white;
}

#sidebar{
  display: flex;
  justify-content: center;
  align-items: flex-start;
  width: 30%;
}

.sidebar-block {
  background-color: white;
  width: 100%;
  border-radius: 5px;
  box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
  -webkit-box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
  -moz-box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
}

.sidebar-content {
    margin: 5% 4% 10%;
}

#time-block {
  display: flex;
  justify-content: center;
  gap: 40%;
  margin-top: 10%;
}

.sidebar-block-title {
  text-align: left;
  font-weight: 200;
}

.time-block-h2 {
  font-weight: 600;
}

</style>