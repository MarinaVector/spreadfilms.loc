<template>
    <div class="container tutorial-video video-grid content-txt">
        <div class="row my-2">
            <div class="col-12">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

                <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                    <i class="fa fa-trash-o pt-2"></i>
                </button>
            </div>

            <div class="col-12">
                <div class="text-center icon-center position-relative">
                    <div class="text-center">
                        <ul id="slides-neu-0" class="icon-trigger text-button">
                            <li data-id="0" class="trigger-multiple">
                                <i class="fa fa-lg fa-bars blueiconcolor fa-2x"></i>
                                Icon 1
                            </li>
                            <li class="trigger-multiple new-entry">
                                <i class="fa fa-lg fa-bars blueiconcolor fa-2x"></i>
                                Icon add
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                    <i class="fa fa-files-o pt-2"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>


export default {
    name: "Icons",
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

    },
    data() {
        return {};
    },
    methods: {
        callParentDeleteParagraphBlock: function () {
            this.$emit('deleteParagraph');
        },
        callParentDuplicateParagraphBlock: function () {
            this.$emit('duplicateParagraph');
        },

    },


    computed: {},
};
</script>

<style>

.icon-trigger {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate3d(-50%, -50%, 0);
    transition: background-color .3s ease;
    background-color: transparent;
    padding: 5px 10px;
    min-width: 160px;
    text-align: center;
}

.trigger-multiple {
    display: inline-block;
    padding: 10px 0;
    position: relative;
    min-width: 140px;
    border-bottom: none;
    border-right: 1px solid #ddd;
}

.new-entry {
    border: none !important;
}

.icon-center {
    min-height: 160px;
}

</style>
