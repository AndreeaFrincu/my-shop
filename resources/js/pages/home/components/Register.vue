<template>
    <div class="register-content">
        <div class="fields">
            <md-field>
                <label>First Name</label>
                <md-input
                    type="text"
                    v-model="type"></md-input>
            </md-field>

            <md-field>
                <label>Last Name</label>
                <md-input
                    type="text"
                    v-model="type"></md-input>
            </md-field>

            <md-field>
                <label>Username</label>
                <md-input
                    type="text"
                    v-model="type"></md-input>
            </md-field>

            <md-field>
                <label>Email</label>
                <md-input
                    type="email"
                    v-model="type"></md-input>
            </md-field>

            <md-field>
                <label>Password</label>
                <md-input
                    type="password"
                    v-model="type"></md-input>
                <span class="md-helper-text">Must contain: at least 12 characters,
                    uppercase and lowercase letters, numbers, and special
                    characters</span>
            </md-field>
        </div>

        <md-button class="md-raised md-primary">Register</md-button>
    </div>
</template>

<script>
export default {
    name: "Register"
}
</script>

<style scoped>

.register-content {
    display: flex;
    flex-direction: column;
    justify-content: space-around;
}

.fields {
    margin: 10px 0 50px 0;
}

</style>
