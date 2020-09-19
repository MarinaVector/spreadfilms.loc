<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-3 inner-trigger lg-head">
                <div class="tutorial-text py-2 mt-5" v-html="NormalTextHeader">

                </div>
            </div>

            <div class="col-lg-5 inner-trigger lg-head">
                <div class="row ml-2 mt-5">
                    <div class="col-lg-12 tutorial-text" v-html="NormalTextBody">

                    </div>
                    <div class="col-lg-9  tutorial-text mt-2">
                        <div class="button-show set-button">
                            <div>
                                <div v-for="(button, index) in Buttons">
                                    <a :class="'btn ' + button.class" :href="button.link" role="button">{{button.text}}</a>
                                </div>
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
        name: "TextWithBigFont",
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
            if(this.Buttons === ''){
                this.Buttons = [];
            } else {
                this.Buttons = JSON.parse(this.escapeHtml(this.Buttons));

                this.Buttons = this.Buttons.map(button => {
                    if (button.buttontype === 'grey') {
                        button.class = "btn-secondary";
                    } else {
                        button.class = "btn-primary";
                    }
                    return button;
                })
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Buttons: this.mydata ? this.escapeHtml(this.$props.mydata.buttons) : [],
                ButtonsJSON: '',
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

