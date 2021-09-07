<template>
    <div class="home">
        <nav-bar></nav-bar>
        <h1>Home</h1>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";

export default {
    components: {NavBar},
    app: 'Hey',
    data() {
        return {
            msg: 'Welcome to Your Vue.js App'
        }
    }
}
</script>

<style scoped>

</style>
