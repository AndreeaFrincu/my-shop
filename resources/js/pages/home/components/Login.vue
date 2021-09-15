<template>
    <div class="login-content">
        <div class="fields">
            <md-field>
                <label>Username or Email</label>
                <md-input
                    type="text"
                    v-model="type"></md-input>
            </md-field>

            <md-field>
                <label>Password</label>
                <md-input
                    type="password"
                    v-model="type"></md-input>
            </md-field>
        </div>

        <md-button class="md-raised md-primary">Register</md-button>
    </div>
</template>

<script>
export default {
    name: "Login"
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
