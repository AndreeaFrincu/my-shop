<template>
    <div class="profile">
        <nav-bar></nav-bar>
        <h1>Profile</h1>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";
export default {
    name: "Profile",
    components: {NavBar},
    async mounted() {
        // await this.$store.dispatch('auth/loadCurrentUser')
        // if (this.$store.state.auth.authenticatedUser.username === null) {
        //     console.log('no user logged in')
        //     await this.$router.push('/auth_err')
        // }
        // await this.$store.dispatch('auth/loadCurrentUser')
    }
}
</script>

<style scoped>

</style>
