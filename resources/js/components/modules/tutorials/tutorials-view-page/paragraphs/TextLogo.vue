<template>
<div class="container">
    <div class="row align-items-start tutorial-complex">
        <div class="col-lg-1 mt-2">
            <div class="row">
                <div class="col-lg-1 mt-2 ml-2">

                </div>
                <div class="col-lg-1 offset-lg-10">
                </div>
            </div>
        </div>

        <div class="col-lg-4 inner-trigger mr-n4">
            <div class="tutorial-text py-2 mt-5">
                <button class="text-button py-1 px-5" type="button">
                    <i class="fas fa-image blueiconcolor fa-2x">
                    </i>
                    <p class="mb-n1 mx-1">Image</p>
                </button>
            </div>
            <div class="tutorial-text py-1 mt-3">
                <button class="text-button py-1 px-5" type="button">
                    <i class="fas fa-bars blueiconcolor fa-2x">
                    </i>
                    <p class="mb-n1 mx-2">Text</p>
                </button>
            </div>
        </div>

        <div class="col-lg-6 inner-trigger mt-n1 ml-n1">
            <div class="row ml-2">
                <div class="col-lg-12 tutorial-text py-5 pt-3">
                    <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1">Text</p>
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-1 mt-2">
            <div class="row py-1">
                <div class="col-lg-3 offset-lg-7 mt-2 mb-5">

                </div>
                <div class="col-lg-3 offset-lg-7 pt-5 mt-3">

                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
        name: "TextLogo",
        components: {

        },
        props: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {};
        },
        methods: {

        },
        computed: {

        },
    };
</script>

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }
</style>
