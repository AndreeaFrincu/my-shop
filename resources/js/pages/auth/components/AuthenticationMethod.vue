<template>
    <div class="auth-content">
        <md-card class="auth-card">
            <md-tabs md-alignment="centered">
                <md-tab id="tab-register" md-label="Register"
                        @click="selected = tabs[0]"></md-tab>
                <md-tab id="tab-login" md-label="Login"
                        @click="selected = tabs[1]"></md-tab>
            </md-tabs>

            <div class="reg-or-log">
                <component :is="selected">
                </component>
            </div>
        </md-card>
    </div>
</template>

<script>
import Register from "./Register";
import Login from "./Login";
export default {
    name: "AuthenticationMethod",
    components: {Login, Register},
    data: () => ({
        tabs: ['register', 'login'],
        selected: 'register'
    })
}
</script>

<style scoped>

.auth-content {
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
