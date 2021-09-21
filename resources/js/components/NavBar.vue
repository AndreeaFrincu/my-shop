<template>
    <div class="nav-bar-content">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
              rel="stylesheet">

        <md-toolbar class="md-primary">

            <md-button class="md-icon-button" @click="showNavigation = true">
                <md-icon class="fa fa-bars"></md-icon>
            </md-button>

            <span class="md-title">shop</span>
            <div class="md-toolbar-section-end">
                <nav-bar-cart></nav-bar-cart>
                <md-button class="nav-bar-btn" @click="showSidepanel = true">
                    <md-icon class="fa fa-info-circle"></md-icon>
                </md-button>
            </div>

        </md-toolbar>

        <md-drawer :md-active.sync="showNavigation" md-swipeable>

            <md-toolbar class="md-transparent" md-elevation="0">
                <span class="md-title">shop name</span>
            </md-toolbar>

            <md-list>
                <md-list-item>
                    <md-icon class="fa fa-home"></md-icon>
                    <span class="md-list-item-text">
            <router-link id="link-home" to="/home">
              <md-button class="drawer-button">
                <p class="drawer-button-text">Home</p>
              </md-button>
            </router-link>
          </span>
                </md-list-item>

                <md-list-item>
                    <md-icon class="fa fa-th-large"></md-icon>
                    <span class="md-list-item-text">
            <router-link id="link-products" to="/products">
              <md-button class="drawer-button">
                <p class="drawer-button-text">Products</p>
              </md-button>
            </router-link>
          </span>
                </md-list-item>

            </md-list>
        </md-drawer>

    </div>
</template>

<script>
import NavBarCart from "./nav-bar-components/NavBarCart";

export default {
    name: "NavBar",
    components: {NavBarCart},
    data: () => ({
        showNavigation: false,
        showSidepanel: false
    })
}
</script>

<style scoped>

.nav-bar-content {
    /*position: fixed;*/
    /*top: 0;*/
    /*width: 100%;*/
}

.nav-bar-btn {
    padding: 0;
}

.drawer-button-text {
    display: flex;
    align-items: flex-start;
}

.md-primary {
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
}

.drawer-button {
    display: flex;
    flex-direction: row;
    align-items: flex-start;
}

#link-home, #link-products, #link-cart {
    color: black;
    color: aliceblue;
    text-decoration: none;
}

</style>
