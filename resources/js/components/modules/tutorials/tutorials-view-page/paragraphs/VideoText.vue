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
            <div class="col-lg-6 inner-trigger mt-n1 ml-n1 my-5 mr-n3">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text py-5 pt-3">
                        <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Video</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 inner-trigger mt-n1 ml-n1 my-5">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text shadow-right py-5 pt-3">
                        <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                            <i class="fas fa-bars blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-1 mt-2">
                <div class="row py-1">
                    <div class="col-lg-3 offset-lg-5 mt-2 mb-5">

                    </div>
                    <div class="col-lg-3 offset-lg-5 pt-5 mt-5">

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "VideoText",
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

    .shadow-right {
        -webkit-box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
        -moz-box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
        box-shadow: 21px 0px 15px -7px rgba(11, 16, 19, 0.2) inset;
    }

</style>
