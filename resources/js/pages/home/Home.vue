<template>
    <div class="home">
        <nav-bar class="nav"></nav-bar>
        <authentication-method class="auth"></authentication-method>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import AuthenticationMethod from "./components/AuthenticationMethod";

export default {
    components: {AuthenticationMethod, NavBar},
    app: 'Hey',
    data() {
        return {
            msg: 'Welcome to Your Vue.js App'
        }
    }
}
</script>

<style scoped>

.home{
    height: 700px;
    display: flex;
    flex-direction: column;
}

.nav {
}

.auth {
    height: 80%;
    margin-top: 40px;
}

</style>
