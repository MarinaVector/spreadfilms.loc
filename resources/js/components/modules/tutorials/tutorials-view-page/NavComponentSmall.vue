<template>
    <div class="tutorials-admin-menu open ml-n3">
        <div class="trigger" @click="showNav"></div>
        <ul v-show="navVisible" class="nav-sm-text">
            <li><a href='/module/tutorials/admin'><i class="fas fa-pen mr-2"></i><span>Manage tutorials</span></a>
            </li>
            <li><a href='/module/tutorials/templates'><i
                class="fas fa-drafting-compass mr-2"></i><span>Templates</span></a></li>
            <li><a href='/module/tutorials/settings'><i class="fas fa-cog mr-2"></i><span>Settings</span></a>
            </li>
            <li><a href='/module/tutorials/statistics'><i class="fas fa-chart-line mr-2"></i><span>Statistics</span></a>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    data() {
        return {

            navVisible: false
        }
    },
    methods: {
        showNav() {
            this.navVisible  = !this.navVisible
        }
    }
}
</script>

<style scoped>
.tutorials-admin-menu.open {
    transform: translateX(0) translateY(-50%);
    box-shadow: 0 0 60px 2px rgba(0, 0, 0, 0.5);
}
.tutorials-admin-menu {
    transform: translateX(-100%) translateY(-50%);
    transition: transform .2s ease-in-out;
    top: 50%;
    position: fixed;
    z-index: 999999;
    background-color: #fff;
    color: #333;
    border-radius: 0 3px 3px 0;
}
*, ::after, ::before {
    box-sizing: border-box;
}

.tutorials-admin-menu .trigger {
    position: absolute;
    right: 0;
    transform: translateX(100%) translateY(-50%);
    top: 50%;
    width: 50px;
    height: 50px;
    background-color: #bbb;
    cursor: pointer;
    border-radius: 0 3px 3px 0;
}

.tutorials-admin-menu.open .trigger:before {
    content: "\f33e";
}

.tutorials-admin-menu .trigger:before {
    content: "\f340";
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate3d(-50%, -50%, 0);
    font-size: 1.3em;
    font-family: "Font Awesome 5 Pro";
    color: #fff;
    font-weight: 100;
}

.tutorials-admin-menu ul {
    padding: 10px 0;
    margin: 0;
}

.tutorials-admin-menu li {
    list-style-type: none;
    padding: 5px 20px;
}

.nav-sm-text {
    color:#424242;
    font-size: 16px;
}

</style>
