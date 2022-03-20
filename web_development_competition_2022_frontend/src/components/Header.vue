<template>
  <div>

    <div id="header">
        <div>
            <div>
                <button @click="sidebarDisplayStatus = !sidebarDisplayStatus"><span id="plus-sign">+</span><span>ADD NEW</span></button>
            </div>
            <div>
                <div>
                    <h2>Thomas Jed</h2>
                    <p>competitor</p>
                </div>
                <button>SIGN OUT</button>
            </div>
        </div>
    </div>
    <div class="sidebar-slider" v-bind:class='{ "sidebar_slider_off": sidebarDisplayStatus, "sidebar_slider_on": !sidebarDisplayStatus}'>
      <form class="w-75 center-block mt-5">
        <h1 class="mb-2">Add new task</h1>
        <label for="type-input" class="text-white">Type</label>
        <div class="input-group input-group-sm mb-3 text-center">
          <input type="text" class="form-control" id="type-input" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <label for="time-input" class="text-white">Time</label>
        <div class="input-group input-group-sm mb-3 w-25">
          <input type="number" class="form-control" id="time-input" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
        </div>

        <label class="text-white">Choose category</label>
        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
          <option selected>Choose category</option>
          <option value="Design">Design</option>
          <option value="Front-End">Front-End</option>
          <option value="Back-End">Back-End</option>
        </select>

        <label class="text-white">Select tags</label>
        <vue-tags-input
            v-model="tag"
            :tags="tags"
            @tags-changed="newTags => tags = newTags"
        />
        <button type="button" class="btn btn-secondary mt-2">Add</button>
      </form>
    </div>

  </div>
</template>



<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
    name: 'HeaderComponent',
    components: {
      VueTagsInput
    },
    data: function() {
      return {
        tag: '',
        tags: [],
        sidebarDisplayStatus: true
      }
    }
}

</script>


<style scoped>

h1, h2, p {
    color: white;
    margin: 0;
}

h2 {
    font-weight: 200;
}

#header {
    background-color: #5D5D5D;
    width: 100%;
    height: 80px;
}

#header > div {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-left: 2%;
    margin-right: 2%;
    height: 100%;
}

#header > div > div {
    display: flex;
    height: 100%;
    justify-content: center;
    align-items: center;
    gap: 3%;
}

#header > div > div > div {
    display: flex;
    flex-direction: column;
    height: 100%;
    justify-content: center;
    text-align: right;
    width: 100%;

}

#header > div > div > button {
    height: 50px;
    width: 150px;
}

#plus-sign {
    font-weight: 900;
    background-color: transparent;
}

button {
    background-color: #696969;
    color: white;
    border-radius: 5px;
    border: 1px solid white;
    width: 80px;
    letter-spacing: 0.5px;
    cursor: pointer;
}

.sidebar_slider_off {
  display: none;
}

.sidebar_slider_on {
  display: table;
}

.sidebar-slider {
  padding-bottom: 2%;
  margin-top: -0.5%;
  position: absolute;
  width: 25%;
  background-color: #5D5D5D;
  box-shadow: 5px 15px 10px 5px rgba(0,0,0,0.48);
}

.center-block {
  display: flex;
  flex-direction: column;
  align-items: flex-start;
  margin-left: auto;
  margin-right: auto;
}

</style>
