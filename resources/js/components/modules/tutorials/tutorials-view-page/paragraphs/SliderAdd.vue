<template>
    <div class="container tutorial-text">
        <div class="row mt-2">
            <div class="col-lg-1 offset-lg-0 col-md-3 offset-md-1 col-7">
                <button type="button" class="btn-icon ml-n2 draggable">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>
            </div>
            <div class="col-lg-1 offset-lg-10 col-md-3 offset-md-5 col-5">

            </div>
        </div>
        <div class="row mb-5 my-5">
            <div class="col-md-2 offset-md-5 col-12 mx-sm-auto buttons-box my-5 py-2">
                <slider-btn></slider-btn>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 offset-md-9 col-lg-1 offset-lg-11 float-sm-right">

            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "SliderAdd",
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

    .buttons-box {
        border-radius: 3px !important;
        background-color: white !important;
        height: auto;
        text-align: center;
    }

    .first-button {

        background-color: white;
        border: none;
        border-bottom: 1px solid #ddd;
    }

</style>
