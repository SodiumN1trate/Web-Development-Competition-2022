<template>
    <div id="sidebar">
        <div class="sidebar-block">
            <div class="sidebar-content">
            <h2>Logged working</h2>
            <div id="time-block">
                <div>
                <h2>15,5 h</h2>
                <p>Total</p>
                </div>
                <div>
                <h2>13,5 h</h2>
                <p>Last month</p>
                </div>
            </div>
            </div>
        </div>
        <div class="sidebar-block">
            <div class="sidebar-content">
            <h2>Logged working</h2>
            <div id="time-block">
                <div>
                <h2>15,5 h</h2>
                <p>Total</p>
                </div>
                <div>
                <h2>13,5 h</h2>
                <p>Last month</p>
                </div>
            </div>
            </div>
        </div>
        <div class="sidebar-block">
            <div class="sidebar-content">
            <h2>Logged working</h2>
            <div id="time-block">
                <div>
                <h2>15,5 h</h2>
                <p>Total</p>
                </div>
                <div>
                <h2>13,5 h</h2>
                <p>Last month</p>
                </div>
            </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: 'SidebarComponent',
    props: ['hours']
}
</script>


<style scoped>

.sidebar-block {
    background-color: white;
    border-radius: 5px;
    box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
    -webkit-box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
    -moz-box-shadow: -10px -1px 92px -19px rgba(0,0,0,0.61);
}

.sidebar-content {
    margin: 10% 4% 2%;
 }

#time-block {
    display: flex;
    justify-content: center;
    gap: 40%;
}

#sidebar{
    margin: 0;
    width: 25%;
}

</style>
