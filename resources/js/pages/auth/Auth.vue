<template>
    <div class="auth-content">
        <authentication-method class="auth-met"></authentication-method>
    </div>
</template>

<script>
import AuthenticationMethod from "./components/AuthenticationMethod"
export default {
    name: "Auth",
    components: {AuthenticationMethod}
}
</script>

<style scoped>

.auth-content {
    height: 100%;
    width: 100%;
    display: flex;
    align-content: center;
}

.auth-met {
    margin-top: 3%;
    height: auto;
}

</style>
