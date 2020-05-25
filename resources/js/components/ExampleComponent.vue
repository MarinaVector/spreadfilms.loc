<template>

    <nav class="navbar navbar-default d-print-none">
        <div>
            <div class="logo"></div>
        </div>
        <div class="scroll">

            <ul class="nav-list mt-5">
                <li class="nav ml-3">
                    <i class="fa fa-sign-in fa-5x" aria-hidden="true"></i>
                    <span class="nav-text ml-3">Login</span>
                </li>
                <li class="ml-3">
                    <i class="fa fa-user fa-5x" aria-hidden="true"></i>
                    <span class="nav-text ml-3">Registrieren</span>
                </li>
            </ul>
        </div>
    </nav>

</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
        }
    };
</script>

<style>

    .logo {
       background: url('/public/img/logo_white.png');
        color:white;
        width: 60px;
        height: 60px;
    }

    .fa-lg {
        font-size: 1em;
    }

    .fa {
        color: white;
        position: relative;
        display: table-cell;
        width: 95px;
        height: 36px;
        text-align: center;
        top: 12px;
        font-size: 20px;
    }

    .main-menu:hover, nav.main-menu.expanded {
        width: 220px;
        overflow: hidden;
        opacity: 1;
    }

    .main-menu {
        position: relative;
        z-index: 1;
        background: #212529;
        position: absolute;
        top: 0;
        bottom: 0;
        height: 100%;
        left: 0;
        width: 99px;
        overflow: hidden;
        -webkit-transition: width .2s linear;
        transition: width .2s linear;
        -webkit-transform: translateZ(0) scale(1, 1);
        box-shadow: 1px 0 15px rgba(0, 0, 0, 0.07);
        opacity: 1;
    }

    .main-menu > ul {
        margin: 7px 0;

    }

    .main-menu li {
        position: relative;
        display: block;
        width: 250px;
    }

    .main-menu li > a {
        position: relative;
        width: 255px;
        display: table;
        border-collapse: collapse;
        border-spacing: 0;
        color: white;
        font-size: 28px;
        text-decoration: beige;
        -webkit-transform: translateZ(0) scale(1, 1);
        -webkit-transition: all .14s linear;
        transition: all .14s linear;
        border-top: 1px solid;
        text-shadow: 1px 1px 1px #fff;
    }

    .main-menu .nav-icon {

        position: relative;
        display: table-cell;
        width: 55px;
        height: 36px;
        text-align: center;
        vertical-align: middle;
        font-size: 18px;
    }

    .main-menu .nav-text {

        position: relative;
        display: table-cell;
        vertical-align: middle;
        width: 190px;
    }


    .main-menu .fb-like {

        left: 180px;
        position: absolute;
        top: 15px;
    }

    .main-menu > ul.logout {
        position: absolute;
        left: 0;
        bottom: 0;

    }

        a:hover, a:focus {
        text-decoration: none;
        border-left: 0px solid #F7F7F7;
    }

    nav {
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
    }

    nav ul, nav li {
        outline: 0;
        margin: 0;
        padding: 0;
    }

    .nav-text {
        color: white;
        z-index: 1;
        font-size: 22px;
    }

    .nav {
        background-color: darkgrey;
        z-index: 2;

    }

</style>
