<template>
    <div class="profile">
        <nav-bar></nav-bar>
        <h1>Profile</h1>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
import auth from "../../middleware/auth/auth";
export default {
    name: "Profile",
    components: {NavBar},
    mixins: [
        auth
    ]
}
</script>

<style scoped>

</style>
