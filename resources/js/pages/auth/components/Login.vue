<template>
    <div class="login-content">
        <form
            novalidate
            @submit.prevent="loginUser">
            <div class="fields">
                <md-field>
                    <label>Username </label>
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
            <router-link id="link-home" to="/products">
                <md-button class="drawer-button">
                    <p class="drawer-button-text">Products</p>
                </md-button>
            </router-link>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import User from "../../../authentication/User";
import Csrf from "../../../authentication/Csrf";
axios.defaults.withCredentials = true

export default {
    name: "Login",
    data:() => ({
        login_form: {
            username: null,
            password: null
        },
        header: {
            'Accept': 'application/json'
        }
    }),
    methods: {
        loginUser() {
            this.$store.dispatch('auth/loginFormUser', this.login_form)
            Csrf.getCookie()
            User.login(this.login_form, this.header)
            .then(() => {
                localStorage.setItem("auth", "true")
                this.$router.push({name: 'products'})
            })
            .catch(error => {
                if(error.response.status === 422) {
                    this.errors = error.response.data.errors
                }
            })
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
