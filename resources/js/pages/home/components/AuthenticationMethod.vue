<template>
    <div class="auth-content">
        <md-card class="auth-card">
            <md-tabs md-alignment="centered">
                <md-tab id="tab-home" md-label="Register"></md-tab>
                <md-tab id="tab-pages" md-label="Login"></md-tab>
            </md-tabs>

            <register></register>
<!--            <login></login>-->
        </md-card>
    </div>
</template>

<script>
import Register from "./Register";
import Login from "./Login";
export default {
    name: "AuthenticationMethod",
    components: {Login, Register}
}
</script>

<style scoped>

.auth-content {
    width: 100%;
    display: flex;
    justify-content: center;
}

.auth-card {
    width: 30%;
    padding: 0 30px 20px 30px;
    display: flex;
    justify-content: flex-start;
    flex-direction: column;
}

</style>
