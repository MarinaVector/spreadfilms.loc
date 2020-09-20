<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-4 inner-trigger mr-n4">
                <img :src="LogoPath" alt="" />
                <div class="tutorial-text py-1 mt-3">
                    <div class="col-lg-12" v-html="SingleText"></div>
                </div>
            </div>

            <div class="col-lg-6 inner-trigger mt-n1 ml-n1">
                <div class="row ml-2">
                    <div class="col-lg-12 tutorial-text" v-html="NormalTextHeader"></div>
                    <div class="col-lg-12 tutorial-text" v-html="NormalTextBody"></div>
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
            if(this.Logo === ''){
                this.Logo = '';
            } else {
                this.Logo = JSON.parse(this.escapeHtml(this.Logo));
                let disk = this.Logo.path.split('/')[0];
                switch (disk) {
                    //Text Layouts
                    case 'company-public':
                        this.LogoPath = this.$parent.publicpath + this.Logo.path.split('/')[1];
                        break;
                    case 'company-private':
                        this.LogoPath = this.$parent.privatepath + this.Logo.path.split('/')[1];
                        break;
                    default:
                        return;
                }
            }
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                SingleText: this.mydata ? this.escapeHtml(this.$props.mydata.singletext) : '',
                Logo: this.mydata ? this.escapeHtml(this.$props.mydata.logo) : '',
                LogoPath: null,
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
</style>
