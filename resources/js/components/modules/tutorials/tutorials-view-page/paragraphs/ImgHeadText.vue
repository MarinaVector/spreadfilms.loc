<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-4 mt-2">
                <div class="row">

                </div>
            </div>
            <div class="col-lg-6 inner-trigger">
                <div class="row">
                    <div class="col-lg-12 tutorial-text py-5">
                        <button class="text-button ml-4 py-2 my-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Image and heading</p>
                        </button>
                    </div>
                    <div class="col-lg-12 tutorial-text py-2">
                        <button class="text-button ml-4 py-2 px-5 mt-2" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1 mx-1">Text</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 mt-2">
                <div class="row py-1">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "ImgHeadText",
        components: {

        },
        props: [
            'index'
        ],
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
