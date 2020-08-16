<template>
    <sidebar-menu :menu="menu"
                  :collapsed="collapsed"
                  :width="width"
                  :widthCollapsed="widthCollapsed"
                  :showOneChild="showOneChild"
                  :showChild="showChild"
                  :rtl="rtl"
                  :relative="relative"
                  :hideToggle="hideToggle"
                  :theme="theme"
                  :disableHover="disableHover"
                  @toggle-collapse="onToggleCollapse"
                  @item-click="onItemClick"/>
</template>
<!-- component documentation -->
<!--https://github.com/yaminncco/vue-sidebar-menu-->
<script>

    import {SidebarMenu} from 'vue-sidebar-menu';

    const separator = {
        template: `<hr style="border-color: #D4D4D4; margin: 15px 0;">`
    };

    export default {
        props: [
            'authuser'
        ],
        data() {
            return {
                // Sidebar menu (required)
                menu: this.prepareNavMenu(),
                // Sidebar Collapse state
                collapsed: true,
                // Sidebar width (expanded)
                width: '300px',
                // Sidebar width (collapsed)
                widthCollapsed: '50px',
                // Keep only one child opened at a time (first level only)
                showOneChild: false,
                // Keep all child open
                showChild: false,
                // Sidebar right to left
                rtl: false,
                // Make sidebar relative to the parent (by default the sidebar is relative to the viewport)
                relative: false,
                // Hide toggle collapse btn
                hideToggle: false,
                // Sidebar theme (available themes: 'white-theme')
                theme: '',
                // Disable hover on collapse mode
                disableHover: false
            };
        },
        created() {

        },
        methods: {
            prepareNavMenu: function () {
                this.authuser = (this.authuser) ? this.authuser : JSON.stringify([]);
                let userObj = JSON.parse(this.authuser);

                if (userObj != undefined) {
                    this.navMenu = [
                        {
                            header: true,
                            title: 'SpreadFilms',
                            hiddenOnCollapse: true
                        },
                        {
                            title: 'Company',
                            icon: 'fa fa-building',
                            child: [
                                {
                                    href: '/company/general-info',
                                    title: 'General info'
                                },
                                {
                                    href: '/company/settings',
                                    title: 'Settings'
                                }
                            ],
                            hidden: true
                        },
                        {
                            component: separator
                        },
                        {
                            title: 'Tutorials',
                            icon: 'fa fa-graduation-cap',
                            child: [
                                {
                                    href: '/module/tutorials',
                                    title: 'View tutorials'
                                },
                                {
                                    href: '/module/tutorials/admin',
                                    title: 'Manage tutorials'
                                },
                                {
                                    href: '/module/tutorials/templates',
                                    title: 'Templates'
                                },
                                {
                                    href: '/module/tutorials/settings',
                                    title: 'Settings'
                                },
                                {
                                    href: '/module/tutorials/statistics',
                                    title: 'Statistics'
                                },
                            ]
                        },
                        {
                            title: 'Config',
                            icon: 'fa fa-cogs',
                            child: [
                                {
                                    href: '/admin/general-config',
                                    title: 'General Config'
                                },
                                {
                                    href: '/admin/user-management',
                                    title: 'User Management'
                                }
                            ]
                        },
                        {
                            title: 'Admin',
                            icon: 'fas fa-user-lock',
                            child: [
                                {
                                    href: '/admin/users',
                                    title: 'Users'
                                },
                                {
                                    href: '/admin/roles_permissions',
                                    title: 'Roles and permissions'
                                }
                            ]
                        },
                        {
                            title: 'Profile',
                            icon: 'fa fa-user',
                            child: [
                                {
                                    href: '/profile/personal-info',
                                    title: 'Personal info'
                                },
                                {
                                    href: '/profile/settings',
                                    title: 'Settings'
                                }
                            ]
                        },
                        {
                            href: '/logout',
                            title: 'Logout',
                            icon: 'fa fa-sign-out'
                        }
                    ];
                } else {
                    this.navMenu = [
                        {
                            href: '/login',
                            title: 'Login',
                            icon: 'fa fa-user'
                        },
                        {
                            href: '/register',
                            title: 'Register',
                            icon: 'fa fa-chart-area'
                        }
                    ];
                }

                return this.navMenu;
            },
            onToggleCollapse(collapsed) {
                console.log(collapsed)
                //this.collapsed = collapsed
            },
            onItemClick(event, item) {
                console.log('onItemClick')
                // console.log(event)
                // console.log(item)
            },
            onResize() {
                /*if (window.innerWidth <= 767) {
                    this.isOnMobile = true
                    this.collapsed = true
                } else {
                    this.isOnMobile = false
                    this.collapsed = false
                }*/
            }
        },
        mounted() {
            this.onResize()
            window.addEventListener('resize', this.onResize)
        },
        components: {
            SidebarMenu
        }
    };

</script>

<style>
    .v-sidebar-menu {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        z-index: 999;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
        width: 100%;
        text-align: left;
        -webkit-transition: 0.3s max-width ease;
        transition: 0.3s max-width ease
    }

    ::-webkit-scrollbar {


    }

    .v-sidebar-menu * {
        -webkit-box-sizing: border-box;
        box-sizing: border-box
    }

    .v-sidebar-menu .vsm--scroll-wrapper {
        height: 100%;
        overflow-y: auto;
        overflow-x: hidden
    }

    .v-sidebar-menu .vsm--dropdown > .vsm--list {
        padding: 5px
    }

    .v-sidebar-menu .vsm--item {
        position: relative;
        display: block;
        width: 100%;
        white-space: nowrap
    }

    .v-sidebar-menu .vsm--link {
        cursor: pointer;
        position: relative;
        display: block;
        font-size: 16px;
        font-weight: 400;
        padding: 10px;
        line-height: 30px;
        text-decoration: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        z-index: 20;
        -webkit-transition: 0.3s all ease;
        transition: 0.3s all ease
    }

    .v-sidebar-menu .vsm--link_exact-active, .v-sidebar-menu .vsm--link_active {
        font-weight: 600
    }

    .v-sidebar-menu .vsm--link_disabled {
        opacity: 0.4;
        pointer-events: none
    }

    .v-sidebar-menu .vsm--link_level-1 .vsm--icon {
        height: 30px;
        line-height: 30px;
        width: 30px;
        text-align: center;
        border-radius: 3px
    }

    .v-sidebar-menu .vsm--link_mobile-item {
        background-color: transparent
    }

    .v-sidebar-menu .vsm--link_mobile-item.vsm--link_hover, .v-sidebar-menu .vsm--link_mobile-item:hover {
        background-color: transparent !important
    }

    .v-sidebar-menu .vsm--link > * {
        vertical-align: middle
    }

    .v-sidebar-menu .vsm--icon {
        display: inline-block;
        margin-right: 10px
    }

    .v-sidebar-menu .vsm--arrow {
        width: 30px;
        text-align: center;
        font-style: normal;
        font-weight: 900;
        position: absolute;
        right: 10px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: 0.3s -webkit-transform ease;
        transition: 0.3s -webkit-transform ease;
        transition: 0.3s transform ease;
        transition: 0.3s transform ease, 0.3s -webkit-transform ease
    }

    .v-sidebar-menu .vsm--arrow:after {
        content: '\f105';
        font-family: 'Font Awesome 5 Free'
    }

    .v-sidebar-menu .vsm--arrow_open {
        -webkit-transform: translateY(-50%) rotate(90deg);
        transform: translateY(-50%) rotate(90deg)
    }

    .v-sidebar-menu .vsm--arrow_slot:after {
        display: none
    }

    .v-sidebar-menu .vsm--header {
        font-size: 14px;
        font-weight: 600;
        padding: 10px;
        white-space: nowrap;
        text-transform: uppercase
    }

    .v-sidebar-menu .vsm--badge {
        position: absolute;
        right: 10px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%)
    }

    .v-sidebar-menu .vsm--badge_default {
        padding: 0px 6px;
        font-size: 12px;
        border-radius: 3px;
        height: 20px;
        line-height: 20px;
        font-weight: 600;
        text-transform: uppercase
    }

    .v-sidebar-menu .vsm--toggle-btn {
        display: block;
        text-align: center;
        font-style: normal;
        font-weight: 900;
        height: 50px;
        cursor: pointer;
        border: none;
        width: 100%
    }

    .v-sidebar-menu .vsm--toggle-btn:after {
        content: '\f337';
        font-family: 'Font Awesome 5 Free'
    }

    .v-sidebar-menu .vsm--toggle-btn_slot:after {
        display: none
    }

    .v-sidebar-menu.vsm_collapsed .vsm--link_level-1.vsm--link_hover, .v-sidebar-menu.vsm_collapsed .vsm--link_level-1:hover {
        background-color: transparent !important
    }

    .v-sidebar-menu.vsm_rtl {
        right: 0;
        left: inherit;
        text-align: right;
        direction: rtl
    }

    .v-sidebar-menu.vsm_rtl .vsm--icon {
        margin-left: 10px;
        margin-right: 0px
    }

    .v-sidebar-menu.vsm_rtl .vsm--arrow {
        left: 10px;
        right: inherit
    }

    .v-sidebar-menu.vsm_rtl .vsm--badge {
        left: 10px;
        right: inherit
    }

    .v-sidebar-menu .expand-enter-active, .v-sidebar-menu .expand-leave-active {
        -webkit-transition: height 0.3s ease;
        transition: height 0.3s ease;
        overflow: hidden
    }

    .v-sidebar-menu .expand-enter, .v-sidebar-menu .expand-leave-to {
        height: 0 !important
    }

    .v-sidebar-menu .slide-animation-enter-active {
        -webkit-animation: slide-animation 0.3s;
        animation: slide-animation 0.3s
    }

    .v-sidebar-menu .slide-animation-leave-active {
        animation: slide-animation 0.2s reverse
    }

    @-webkit-keyframes slide-animation {
        0% {
            width: 0%
        }
        100% {
            width: 100%
        }
    }

    @keyframes slide-animation {
        0% {
            width: 0%
        }
        100% {
            width: 100%
        }
    }

    .v-sidebar-menu .vsm--mobile-item > .vsm--item {
        padding-top: 0 !important;
        margin-top: 0 !important
    }

    .v-sidebar-menu {
        background-color: #2a2a2e
    }

    .v-sidebar-menu .vsm--link {
        color: #fff
    }

    .v-sidebar-menu .vsm--link_exact-active, .v-sidebar-menu .vsm--link_active {
        color: #fff
    }

    .v-sidebar-menu .vsm--link_level-1.vsm--link_exact-active, .v-sidebar-menu .vsm--link_level-1.vsm--link_active {
        -webkit-box-shadow: 3px 0px 0px 0px #4285f4 inset;
        box-shadow: 3px 0px 0px 0px #4285f4 inset
    }

    .v-sidebar-menu .vsm--link_level-1.vsm--link_exact-active .vsm--icon, .v-sidebar-menu .vsm--link_level-1.vsm--link_active .vsm--icon {
        color: #fff;
        background-color: #1e1e21
    }

    .v-sidebar-menu .vsm--link_level-1 .vsm--icon {
        background-color: #1e1e21
    }

    .v-sidebar-menu .vsm--link_hover, .v-sidebar-menu .vsm--link:hover {
        color: #fff;
        background-color: rgba(30, 30, 33, 0.5)
    }

    .v-sidebar-menu .vsm--link_mobile-item {
        color: #fff
    }

    .v-sidebar-menu .vsm--link_mobile-item.vsm--link_hover, .v-sidebar-menu .vsm--link_mobile-item:hover {
        color: #fff
    }

    .v-sidebar-menu.vsm_collapsed .vsm--link_level-1.vsm--link_hover .vsm--icon, .v-sidebar-menu.vsm_collapsed .vsm--link_level-1:hover .vsm--icon {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu .vsm--icon {
        color: #fff
    }

    .v-sidebar-menu .vsm--dropdown .vsm--list {
        background-color: #36363b
    }

    .v-sidebar-menu .vsm--dropdown .vsm--link {
        color: #fff
    }

    .v-sidebar-menu .vsm--dropdown .vsm--icon {
        color: #fff
    }

    .v-sidebar-menu .vsm--mobile-bg {
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_expanded .vsm--item_open .vsm--link_level-1 {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_expanded .vsm--item_open .vsm--link_level-1 .vsm--icon {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_rtl .vsm--link_level-1.vsm--link_active, .v-sidebar-menu.vsm_rtl .vsm--link_level-1.vsm--link_exact-active {
        -webkit-box-shadow: -3px 0px 0px 0px #4285f4 inset;
        box-shadow: -3px 0px 0px 0px #4285f4 inset
    }

    .v-sidebar-menu .vsm--header {
        color: rgba(255, 255, 255, 0.7)
    }

    .v-sidebar-menu .vsm--badge_default {
        color: #fff;
        background-color: #1e1e21
    }

    .v-sidebar-menu .vsm--toggle-btn {
        color: #fff;
        background-color: #1e1e21
    }

    .v-sidebar-menu.vsm_white-theme {
        background-color: #fff
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link {
        color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_exact-active, .v-sidebar-menu.vsm_white-theme .vsm--link_active {
        color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_level-1.vsm--link_exact-active, .v-sidebar-menu.vsm_white-theme .vsm--link_level-1.vsm--link_active {
        -webkit-box-shadow: 3px 0px 0px 0px #4285f4 inset;
        box-shadow: 3px 0px 0px 0px #4285f4 inset
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_level-1.vsm--link_exact-active .vsm--icon, .v-sidebar-menu.vsm_white-theme .vsm--link_level-1.vsm--link_active .vsm--icon {
        color: #fff;
        background-color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_level-1 .vsm--icon {
        background-color: #bbc5d6
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_hover, .v-sidebar-menu.vsm_white-theme .vsm--link:hover {
        color: #262626;
        background-color: #f2f2f2
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_mobile-item {
        color: #fff
    }

    .v-sidebar-menu.vsm_white-theme .vsm--link_mobile-item.vsm--link_hover, .v-sidebar-menu.vsm_white-theme .vsm--link_mobile-item:hover {
        color: #fff
    }

    .v-sidebar-menu.vsm_white-theme.vsm_collapsed .vsm--link_level-1.vsm--link_hover .vsm--icon, .v-sidebar-menu.vsm_white-theme.vsm_collapsed .vsm--link_level-1:hover .vsm--icon {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_white-theme .vsm--icon {
        color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--dropdown .vsm--list {
        background-color: #e3e3e3
    }

    .v-sidebar-menu.vsm_white-theme .vsm--dropdown .vsm--link {
        color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--dropdown .vsm--icon {
        color: #262626
    }

    .v-sidebar-menu.vsm_white-theme .vsm--mobile-bg {
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_white-theme.vsm_expanded .vsm--item_open .vsm--link_level-1 {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_white-theme.vsm_expanded .vsm--item_open .vsm--link_level-1 .vsm--icon {
        color: #fff;
        background-color: #4285f4
    }

    .v-sidebar-menu.vsm_white-theme.vsm_rtl .vsm--link_level-1.vsm--link_active,
    .v-sidebar-menu.vsm_white-theme.vsm_rtl .vsm--link_level-1.vsm--link_exact-active {
        -webkit-box-shadow: -3px 0px 0px 0px #4285f4 inset;
        box-shadow: -3px 0px 0px 0px #4285f4 inset
    }

    .v-sidebar-menu.vsm_white-theme .vsm--header {
        color: rgba(38, 38, 38, 0.7)
    }

    .v-sidebar-menu.vsm_white-theme .vsm--badge_default {
        color: #262626;
        background-color: #f2f2f2
    }

    .v-sidebar-menu.vsm_white-theme .vsm--toggle-btn {
        color: #262626;
        background-color: #f2f2f2
    }

    .fa {
        top: 0px;
    }
</style>
