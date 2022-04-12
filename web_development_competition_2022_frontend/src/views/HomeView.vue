<template>
  <div class="home">
    <HeaderComponent :id="this.$store.state.userId" :name="this.$store.state.name"/>
    <div id="content">
        <draggable @start="drag=true" @end="drag=false" id="sidebar">
          <div class="sidebar-block">
              <div class="sidebar-content">
                <h2 class="sidebar-block-title" >Logged working hours</h2>
                <div id="time-block">

                    <div>
                      <h2 class="time-block-h2">{{ this.$store.state.hours }} h</h2>
                      <p class="time-block-p">Total</p>
                    </div>

                    <div>
                      <h2 class="time-block-h2">{{ this.$store.state.hours }} h</h2>
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
                    Occurrence
                  </div>

                  <div>
                    <PieGraphTimeComponent />
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

        </draggable>

        <div id="main">
          <table id="tasks">
            <tr>
              <th>DATE</th>
              <th>TYPE</th>
              <th>CATEGORY</th>
              <th>TIME</th>
              <th>NOTES</th>
              <th>TAGS</th>
            </tr>
            <tr v-for="task in this.$store.state.tasks" :key="task.id">
              <td>{{ task.created_at }}</td>
              <td>{{ task.type }}</td>
              <td>{{ task.category }}</td>
              <td>{{ task.time }}h</td>
              <td>{{ task.notes }}</td>
              <td v-for="tag in task.tags" :key="tag.id" class="tags-block">
                  <span class="tag">{{ tag.text }}</span>
                  <h2>🖉</h2>
              </td>
            </tr>
          </table>
        </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import HeaderComponent from '../components/Header.vue'
import BarGraphComponent from '../components/BarGraph.vue'
import PieGraphComponent from '../components/PieGraph.vue'
import PieGraphTimeComponent from "@/components/PieGraphTime";
import draggable from 'vuedraggable'


export default {
  name: 'HomeView',
  components: {
    HeaderComponent,
    BarGraphComponent,
    PieGraphComponent,
    PieGraphTimeComponent,
    draggable
    // SidebarComponent
  },
  beforeMount: function () {
    this.$store.dispatch('get_user').catch(() => {
      this.$router.push('/login')
    })

    this.$store.dispatch('get_tasks').then(() => {
      console.log(this.$store.state.tasks)
    })

    this.$store.dispatch('get_hours').then(() => {})

  }
}
</script>

<style scoped>

h2, p {
  margin: 0;
  font-weight: 200;
}

#content {
  max-width: 1800px;
  width: 100%;
  display: flex;
  justify-content: center;
  gap: 2%;
  margin-left: auto;
  margin-right: auto;
  margin-top: 3%;
  align-items: flex-start;
}

#sidebar{
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
  width: 25%;
}

.sidebar-block {
  background-color: white;
  width: 100%;
  margin-bottom: 5%;
  border-radius: 5px;
  box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
  -webkit-box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
  -moz-box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
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
  border-radius: 5px;
  margin-bottom: 2%;
  font-size: 12px;
  display: flex;
  align-items: center;
}


#main{
  width: 75%;
  background-color: white;
  border-radius: 6px;
  box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
  -webkit-box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
  -moz-box-shadow: 7px 3px 16px -7px rgba(0,0,0,0.75);
}


#tasks {
  height: auto;
  width: 100%;
  border-collapse: collapse;
  border-radius: 6px;
  overflow: hidden;
}

#tasks > tr {
  border-bottom: 1px solid #ddd;
  border-radius: 1em;
}

#tasks > tr > th {
  color: #595959;
  background-color: #c2c2c2;
  padding-left: 1%;
  padding-right: 2%;
  padding-top: 1%;
  padding-bottom: 1%;
  text-align: left;
}


#tasks > tr > td {
  margin-right: 0.5%;
  padding: 1.3%;
  text-align: left;
}


#tasks > td, #tasks > th {
  padding: 8px;
}

</style>
