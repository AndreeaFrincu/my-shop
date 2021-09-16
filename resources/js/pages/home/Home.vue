<template>
    <div class="home">
        <nav-bar></nav-bar>
    </div>
</template>

<script>
import NavBar from "../../components/NavBar";

export default {
    components: {NavBar},
    data: () => ({

    })
}
</script>

<style scoped>

.home{
    height: 700px;
    display: flex;
    flex-direction: column;
}

</style>
