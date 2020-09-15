<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-2 mt-2">
                <div class="row">

                </div>
            </div>

            <div class="col-lg-3 inner-trigger lg-head">
                <div class="tutorial-text py-2 mt-5">
                    <button class="text-button py-2 px-5 my-2" type="button">
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">HeadLine</p>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 inner-trigger lg-head">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text">
                        <button class="text-button py-2 my-4 px-5" type="button">
                            <i class="fas fa-image blueiconcolor fa-2x">
                            </i>
                            <p class="mb-n1">Text</p>
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
        name: "LgHeadText",
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
            return {
                show: false,
                hide: true
            };
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

    .lg-head {
        position: relative;
        z-index: 1;
    }

    .button-show {
        z-index: 2;
    }

    .set-button {
        z-index: 2;
    }

</style>

