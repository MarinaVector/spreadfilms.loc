<template>
   <div class="container lyout-panel">
        <div class="row align-items-start tutorial-complex">
            <div class="col-lg-1 mt-2">
                <div class="row">
                    <div class="col-lg-1 mt-2 ml-3">

                    </div>
                    <div class="col-lg-1 offset-lg-10">
                    </div>
                </div>
            </div>

            <div class="trigger-headline col-lg-4 mt-5">
                <div class="tutorial-text h-block mt-5">
                    <div class="col-lg-12" v-html="NormalTextHeader"></div>
                </div>
            </div>

            <div class="col-lg-6 down-trigger">
                <div class="row ml-2">
                    <div class="col-lg-12 tutorial-text py-5 pt-3">
                        <img :src="ImagePath" alt="" />
                    </div>

                    <div class="col-lg-12 tutorial-text">
                        <div class="col-lg-12" v-html="NormalTextBody"></div>
                    </div>
                </div>
            </div>
        </div>
   </div>
</template>

<script>
    export default {
        name: "TextImgHigh",
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
            this.ImagePath = this.getImagePath(this.Image);
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Image: this.mydata ? this.escapeHtml(this.$props.mydata.image) : '',
                ImagePath: null,
                normalBefore:true,
                normalAfter: false,
                btnBefore: true,
                btnAfter: false,
                headerText: false,
            };
        },
        methods: {
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
            getImagePath: function(path) {
                let disk = path.split('/')[0];
                let realPath = '';
                switch (disk) {
                    case 'company-public':
                        realPath = this.$parent.publicpath + path.split('/')[1];
                        break;
                    case 'company-private':
                        realPath = this.$parent.privatepath + path.split('/')[1];
                        break;
                    default:
                        return;
                }

                return realPath;
            },
        },
        computed: {

        },
    };
</script>

<style>

</style>
