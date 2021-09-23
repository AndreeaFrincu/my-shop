<template>
    <div class="auth-error">
        <md-empty-state
            class="md-accent state-container"
            md-rounded
            md-icon="person_search"
            md-label="User not found"
            md-description="Can't access this page">
            <router-link to="/">
                <md-button
                    class="md-primary md-raised redirect-btn">
                    Please register / log in to access Profile
                </md-button>
            </router-link>
        </md-empty-state>
    </div>
</template>

<script>
export default {
    name: "AuthError"
}
</script>

<style scoped>

.auth-error {
    display: flex;
    width: 100%;
    height: 100%;
}

.state-container {
    display: flex;
    margin-top: 7%;
}

.redirect-btn {
    text-transform: none;
}

</style>
