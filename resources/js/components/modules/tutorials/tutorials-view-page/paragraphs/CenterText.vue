<template>
    <div class="container mt-md-5" id="tutorial-text">
        <input type="hidden" name="component_type" value="CenterText" class="component_type" ref="component_type"/>

        <div class="row">
            <div class="col-md-12">
                <div class="headline h2 text-left mb-2 mt-2 final-header" v-html="NormalTextHeader">

                </div>
                <div class="final-text" v-html="NormalTextBody">

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "CenterText",
        components: {

        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {
                }
            },
        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
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

<style>

.blueiconcolor {
    color: #00bff9 !important;
}

.position-button {
    z-index: 20;
    position: relative;
}

.text-print {

    column-count: 2;
    margin-bottom: 20px;
}

.text-output {
    position: absolute;
}

.final-header:before {

    background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
    content: "";
    width: 60px;
    height: 4px;
    background: #333;
    top: -10px;
    position: absolute;
    left: 0;
}

.final-text {
    column-count: 2;
    column-gap: 20px;
    padding-bottom: 20px;
}

.headline {
    width: 100%;
}

.headline {
    margin-top: 40px;
}

.headline {
    position: relative;
    margin: 0;
    padding-bottom: 20px;
    font-size: 3.1em;
    line-height: 1em;
}

.h2 {
    font-size: 2rem;
}


</style>
