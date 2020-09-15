<template>
    <div class="container head-right">
        <div class="row nav-text">
            <div class="col-lg-5 tutorial-text btn-all">
                <div class="row">
                    <div class="col-6 offset-md-6 col-md-6 py-3">
                        <div class="text-final">
                            <div class="text-out">
                                <div class="text-header headline h2 text-left mb-3" v-html="NormalTextHeader"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "Headline",
        components: {

        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {}
            },
        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            };
        },
        methods: {
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {

        },
    };
</script>

<style scoped>
    .nav-text {
        border-bottom: 1px solid #d9d9d9 !important;
        color: #424242 !important;
        font-size: 13px;
        background: #f9f9f9;
        position: relative;
    }

    .tutorial-text {
        width: 100%;
        border: dotted 1px #333;
        z-index: 1 !important;
    }

    .btn-small {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        color: #fff;
        border: none;
        width: 20px;
        height: 20px;
        border-radius: 5px;
        text-align: center;
        cursor: pointer;
        opacity: 0.5 !important;
        transition: opacity .25s ease-in-out !important;
        -moz-transition: opacity .25s ease-in-out !important;
        -webkit-transition: opacity .25s ease-in-out !important;
    }

    .icon-sm {
        font-size: 10px !important;
    }

    .head-tutorial {
        font-size: 12px;
    }

    .fa-heading {
        font-size: 28px !important;
        font-weight: bold !important;
    }

    .tutorial-text:hover .btn-small {
        opacity: 1 !important;
    }

    .head-right:hover .btn-small {
        opacity: 1 !important;
    }

</style>
