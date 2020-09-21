<template>
    <div class="container">
        <div class="row align-items-start tutorial-complex imghead-grid">
            <div class="col-lg-4 inner-trigger mr-n4">
                <img :src="FirstImagePath" alt="" />
                <img :src="SecondImagePath" alt="" />
                <div class="tutorial-text py-1 mt-3">
                    <div class="col-lg-12" v-html="SpecialText"></div>
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
        name: "TxtSpecialImg",
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
            if(this.NormalTextHeader !== "" || this.NormalTextBody !== ""){
                this.normalAfter = true;
                this.btnAfter = true;
                this.headerText = true;
            }
        },
        mounted() {
            this.FirstImagePath = this.getImagePath(this.FirstImage);
            this.SecondImagePath = this.getImagePath(this.SecondImage);
        },
        data() {
            return {
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                SpecialText: this.mydata ? this.escapeHtml(this.$props.mydata.specialtext) : '',
                FirstImage: this.mydata ? this.escapeHtml(this.$props.mydata.firstimage) : '',
                SecondImage: this.mydata ? this.escapeHtml(this.$props.mydata.secondimage) : '',
                FirstImagePath: null,
                SecondImagePath: null,
                normalBefore:true,
                normalAfter: false,
                btnBefore: true,
                btnAfter: false,
                headerText: false,
            };
        },
        methods: {
            callParentDeleteParagraphBlock: function() {
                this.$emit('deleteParagraph');
            },
            callParentDuplicateParagraphBlock: function() {
                this.$emit('duplicateParagraph');
            },
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

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .imghead-grid {
        display: grid;
        grid-gap: initial;
    }


</style>
