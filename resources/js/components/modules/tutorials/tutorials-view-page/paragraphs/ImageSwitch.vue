<template>
    <div class="container tutorial-switch content-txt">
        <input type="hidden" name="component_type" value="ImageSwitch" class="component_type" ref="component_type"/>
        <input type="hidden" name="image_before" v-model="ImageBefore" class="image_before">
        <input type="hidden" name="image_after" v-model="ImageAfter" class="image_after">
        <div class="row switch-grid my-2">
            <div class="row">
                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image"
                     :style="{ backgroundImage: 'url(/companies/1/public/' + ImageBeforePath +')' }">
                </div>

                <div class="col-lg-6 text-center d-inline-block py-5 pt-3 background-image"
                     :style="{ backgroundImage: 'url(/companies/1/public/' + ImageAfterPath + ')' }">
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
        this.updateStyles();
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
        callParentDeleteParagraphBlock: function () {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function () {
            this.$emit('duplicateParagraph');
        },
        showNormalTextModal: function () {
            let element = this.$refs.textmodal.$el;
            $(element).modal('show');
        },
        showImagesModal: function () {
            let element = this.$refs.imagesmodal.$el;
            $(element).modal('show');
        },
        saveData: function (header = null, body = null, imagesObj = null) {
            if (header !== null) {
                this.NormalTextHeader = header;
            }

            if (body !== null) {
                this.NormalTextBody = body;
            }

            if (imagesObj !== null) {
                this.ImageBefore = imagesObj.imagebefore;
                this.ImageBeforePath = this.getImagePath(this.ImageBefore);
                this.ImageAfter = imagesObj.imageafter;
                this.ImageAfterPath = this.getImagePath(this.ImageAfter);
                this.TextBefore = imagesObj.textbefore;
                this.TextAfter = imagesObj.textafter;
            }

            this.$emit('saveParagraphData', {
                index: this.index,
                myData: {
                    header: header,
                    text: body,
                    imagebefore: this.ImageBefore,
                    imageafter: this.ImageAfter,
                    textbefore: this.TextBefore,
                    textafter: this.TextAfter,
                }
            });

            this.updateStyles();
        },
        escapeHtml: function (value) {
            return $('<div/>').html(value).text();
        },
        updateStyles: function () {
            if (this.NormalTextHeader === null || this.NormalTextHeader === '') {

            } else {

            }

            let imagesAffectedByFirst = null;
            let imagesAffectedBySecond = null;
            if (this.ImageBefore === null || this.ImageBefore === '') {
                this.imagesAffectedByFirst = true;
            } else {
                this.imagesAffectedByFirst = false;
            }

            this.imagesAffectedBySecond = this.ImageAfter === null || this.ImageAfter === '';

        },
        getImagePath: function (path) {
            let disk = path.split('/')[0];
            let realPath = '';
            switch (disk) {
                case 'company-public':
                    realPath = this.$parent.$parent.publicpath + path.split('/')[1];
                    break;
                case 'company-private':
                    realPath = this.$parent.$parent.privatepath + path.split('/')[1];
                    break;
                default:
                    return '';
            }

            return realPath;
        },
    },

    computed: {},
};
</script>

<style>


</style>
