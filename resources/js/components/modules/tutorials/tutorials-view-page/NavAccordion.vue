<template>
    <div>
        <div class="logo-80px mx-auto">
            <img :src="logoVal">
        </div>
        <div class="input-form mb-4 pt-4">
            <input placeholder="Search for..." type="text" class="form-control search-input pl-holder">
            <span class="search-icon px-2"><i class="fas fa-search mt-2"></i></span>
        </div>
        <div>

            <div class="last menu-before mb-3">
                <div class=" last-inner theme-background-horizontal">
                    <span class="tutorial-phrase p-2">Continue <strong>"What makes us successful"</strong>go</span>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "NavAccordion",
        components: {

        },
        props: {
            logo: {
                type: String,
                default: null
            },
        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                logoVal: this.logo ? this.logo : '/public/img/logo_white.png',
            };
        },
        methods: {
            arrowEl() {

            }
        },
        computed: {

        },
    }
</script>

<style>

    .input-form {
        display: flex;
        width: 210px;
    }

    .tutorial-phrase {
        display: block;
    }

    .tutorial-phrase {
        border-radius: 3px;
        background: #fff;
        color: #d32f2f;
        border: solid #d32f2f 1px;
    }

    .pl-holder {
        border: solid 1px #aaa;
    }

    .search-icon {
        text-align: center;
        background: #ccc;
        border: solid 1px #aaa;
        right: 20px;
        border-radius: 0 4px 4px 0;
        border-left: none;
        cursor: pointer;
    }

    .search-icon i {
        color: #fff;
        font-size: 1.3em;
        cursor: pointer;
    }

    .search-input {
        border: solid 1px #aaa;
        border-radius: 4px 0 0 4px;
        padding: 7px 50px 7px 20px;
        display: block;
        width: 100%;
        cursor: pointer;
    }

    div .logo-80px {
        margin-left: 50%;
        width: 210px;
        height: auto;
        background-color: #424242;
        cursor: pointer;
    }

</style>
