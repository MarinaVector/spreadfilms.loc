<template>
    <div class="container mt-3">

        <div class="row">
            <div class="col-md-12">
                <div class="backtximg" :id="dataInputPreviewID" ref="preview">
                </div>
                <div class="row">
                    <div class="col-6 offset-md-6 col-md-6 py-3">
                        <div class="text-final">

                            <div class="text-out">
                                <div class="text-header headline h2 text-left mb-3" v-html="NormalTextHeader">

                                </div>
                                <div class="text-justify" v-html="NormalTextBody">
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
        components: {},
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {}
            },
            blocksCounterID: {
                type: Number,
                default: null
            },
        },
        data() {
            return {
                dataInputID: '',
                dataInputPreviewID: '',
                NormalTextHeader: this.mydata ? this.escapeHtml(this.$props.mydata.header) : '',
                NormalTextBody: this.mydata ? this.escapeHtml(this.$props.mydata.text) : '',
                Src: this.mydata ? this.$props.mydata.src : '',
            };
        },
        created() {

        },
        mounted() {
            this.dataInputID = 'background-image-' + this.$props.blocksCounterID;
            this.dataInputPreviewID = 'background-image-' + this.$props.blocksCounterID + '-preview';
            $(this.$refs.preview).css("background-image", "url(" + this.Src + ")");
        },
        methods: {
            callParentDeleteParagraphBlock: function () {
                this.$emit('childToParent');
            },
            callParentDuplicateParagraphBlock: function () {
                this.$emit('duplicateParagraph');
            },
            showTextModal: function () {
                let element = this.$refs.modal.$el;
                $(element).modal('show');
            },
            saveData: function (header, body) {
                this.NormalTextHeader = header;
                this.NormalTextBody = body;
            },
            getPreviousData: function () {
                return [1, 2];
            },
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
        },
        computed: {}
    };
</script>

<style>
.inner-trigger {
    transition: background-color .3s ease;
    background-color: transparent;
    padding: 5px 10px;
    min-width: 160px;
    text-align: center;
}

.text-button {
    background-color: white;
    border: none;
}

.level-text {
    pointer-events: all;
    position: absolute;
    top: 50%;
    cursor: pointer;
    left: 100%;
    transform: translate3d(-50%, -50%, 0);
    transition: opacity .3s ease, background-color .5s ease;
    width: 36%;
    height: 80%;
    background-color: #d9d9d9;
    z-index: 2;
}

.level-text:hover {
    background-color: #6c6c6c;
}

.btn-icon {
    background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
    color: #fff;
    border: none;
    top: 20px;
    width: 40px;
    height: 40px;
    border-radius: 5px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
    opacity: 0.5 !important;
    transition: opacity .25s ease-in-out !important;
    -moz-transition: opacity .25s ease-in-out ! important;
    -webkit-transition: opacity .25s ease-in-out !important;
}

.module-text {
    width: 100%;
    height: 100%;
    border: dotted 1px #333;
    z-index: 1;
    background-size: cover;
    background-position: center;
    cursor: pointer;
}

.tutorial-right {
    width: 100%;
}

.module-text:hover {
    background-color: #7c7c7c;
    cursor: pointer;
    transition: opacity .3s ease, background-color .5s ease;
}

.text-image:hover .btn-icon,
.tutorial-right:hover .btn-icon {
    opacity: 1 !important;
}

.blueiconcolor {
    color: #00bff9 !important;
}

.text-image {
    border-bottom: 1px solid #d9d9d9;
    background-color: #f9f9f9;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 274px;
    max-height: 1000px;
    min-height: 239px;
}

.row-image {
    height: inherit;
}

.text-final {
    color: #fff;
    background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
}

.text-out {
    border: none;
    color: #fff;
    position: relative;
    transform: none;
    padding: 50px;
    width: 100%;
    top: 0;
    height: auto;
    left: 0;
}

.grid-img-text {
    display: grid;
    grid-template-columns: 3fr 2fr;
    grid-template-rows: 80% 120%;
    justify-items: start;
}

.backtximg {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    margin: auto;
    background-repeat: no-repeat;
    -o-object-fit: cover;
    object-fit: cover;
    max-width: 100%;
    margin-bottom: 5px;
    margin-right: 40%;
}
</style>
