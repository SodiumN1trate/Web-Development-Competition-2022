<template>
    <div id="header">
        <div>
            <div>
                <button><span id="plus-sign">+</span><span>ADD NEW</span></button>
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
</template>



<script>

export default {
    name: 'HeaderComponent'
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
    background-color: #696969;
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
    height: 30px;
    width: 80px;
    letter-spacing: 0.5px;
    cursor: pointer;
}

</style>