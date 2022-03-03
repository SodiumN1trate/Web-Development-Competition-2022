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

          <div class="sidebar-block">
              <div class="sidebar-content">
                <h2 class="sidebar-block-title" >12 months overview</h2>
                <BarGraphComponent />
              </div>
          </div>

          <div class="sidebar-block">
              <div class="sidebar-content">
                <h2 class="sidebar-block-title" >Categories</h2>
                <div id="pie-graph-block">
                  <div>        
                    <PieGraphComponent />
                    Occurence
                  </div>

                  <div>
                    <PieGraphComponent />
                    Time
                  </div>
                </div>
              </div>
          </div>

          <div class="sidebar-block">
              <div class="sidebar-content">
                <h2 class="sidebar-block-title" >Used technologies</h2>
                <div class="tags-block">
                  <span class="tag">CSS 2</span>
                  <span class="tag">HTML 2</span>
                  <span class="tag">Front-End 2</span>
                  <span class="tag">JS 2</span>
                  <span class="tag">Figma 2</span>
                  <span class="tag">UI 2</span>
                  <span class="tag">Prototyping 2</span>
                  <span class="tag">DB 2</span>
                  <span class="tag">Back-End 2</span>
                  <span class="tag">Security 2</span>

                </div>
              </div>
          </div>


        </div>

        <div id="main">
        </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderComponent from '../components/Header.vue'
import BarGraphComponent from '../components/BarGraph.vue'
import PieGraphComponent from '../components/PieGraph.vue'


export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
    BarGraphComponent,
    PieGraphComponent
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
  flex-direction: column;
  justify-content: flex-start;
  width: 30%;
}

.sidebar-block {
  background-color: white;
  width: 100%;
  margin-bottom: 5%;
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

#pie-graph-block {
  display: flex;
  flex-direction: row;
}

#pie-graph-block > div {
  width: 50%;
}

.tags-block {
  margin-top: 2%;
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  column-gap: 2%;
}

.tag {
  background-color: #9c9c9c;
  color: #fff;
  padding: 1% 2% 1%; 
  border-radius: 10px;
  margin-bottom: 2%;
}

</style>