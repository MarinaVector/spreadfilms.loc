<template>
    <div class="container tutorial-switch content-txt">
        <div class="row switch-grid my-2">
            <div class="row">
                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image"
                     :style="{ backgroundImage: 'url(' + ImageBeforePath +')' }">
                </div>

                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image"
                     :style="{ backgroundImage: 'url(' + ImageAfterPath + ')' }">
                </div>

                <div class="col-lg-12 py-5 content-txt position-relative text-center">

                    <div class="">
                        <div class="text-header h2 text-left position-relative pb-0 normal_text"
                             v-html="NormalTextHeader">
                        </div>
                        <div class="final-text text-justify" v-html="NormalTextBody"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>


export default {
    name: "ImageSwitch",
    components: {},
    props: {
        index: {
            type: Number,
            default: null
        },
        mydata: {
            type: Object,
            default: () => ({}),
        },
    },
    created() {

    },
    mounted() {
        this.ImageBeforePath = this.getImagePath(this.ImageBefore);
        this.ImageAfterPath = this.getImagePath(this.ImageAfter);
    },
    data() {
        return {
            NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
            NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
            ImageBefore: this.mydata.imagebefore ? this.mydata.imagebefore : '',
            ImageBeforePath: true,
            ImageAfter: this.mydata.imageafter ? this.mydata.imageafter : '',
            ImageAfterPath: true,
            TextBefore: this.mydata.textbefore ? this.escapeHtml(this.mydata.textbefore) : '',
            TextAfter: this.mydata.textafter ? this.escapeHtml(this.mydata.textafter) : '',
            dataImageBeforeID: '',
            dataImageAfterID: ''

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

    computed: {},
};
</script>

<style>


</style>
