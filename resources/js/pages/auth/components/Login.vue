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
            <router-link to="/products">
                <md-button
                id="test-btn">
                    <p>proceed as guest</p>
                </md-button>
            </router-link>
        </form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data:() => ({
        login_form: {
            username: null,
            password: null
        }
    }),
    methods: {
        async loginUser() {
            await this.$store.dispatch('auth/loginFormUser', this.login_form)
            await this.$store.dispatch('auth/loginUser')
            if (this.$store.state.auth.authenticatedUser.username !== null) {
                console.log('user logged in')
                await this.$router.push('/products')
            }
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

#submit-login-btn, #test-btn {
    width: 100%;
}

</style>
