<template>
    <div class="login-content">
        <form
            novalidate
            @submit.prevent="loginUser">
            <div class="fields">
                <md-field>
                    <label>Username or Email</label>
                    <md-input
                        v-model="login_form.username"
                        type="text"></md-input>
                </md-field>

                <md-field>
                    <label>Password</label>
                    <md-input
                        v-model="login_form.password"
                        type="password"></md-input>
                </md-field>
            </div>

            <md-button
                id="submit-login-btn"
                type="submit"
                class="md-raised md-primary">
                Login
            </md-button>
        </form>
    </div>
</template>

<script>
import axios from "axios";
axios.defaults.withCredentials = true

export default {
    name: "Login",
    data:() => ({
        login_form: {
            username: null,
            password: null
        }
    }),
    methods: {
        loginUser() {
            this.$store.dispatch('auth/loginFormUser', this.login_form)
            this.$store.dispatch('auth/loginUser')
        }
    }
}
</script>

<style scoped>

.login-content {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.fields {
    margin: 10px 0 50px 0;
}

</style>
