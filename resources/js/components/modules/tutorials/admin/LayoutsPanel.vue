<template>
    <div class="container inner-menu mt-3 pt-1">
        <div class="mt-3 mb-3">
            <a href="#">
                <button type="button" class="btn-blue layouts">
                    Layouts filters<i class="fas fa-filter ml-1"></i>
                </button>
            </a>

            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip"
                    data-placement="bottom" title="Video">
                <i class="fa fa-file-video-o fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle new-text" type="button" data-toggle="tooltip"
                    data-placement="bottom" title="Video with Background">
                <i class="fa fa-file-video-o fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip"
                    data-placement="bottom" title="Normal Text" @click="addParagraphBlock('normalText')">
                <i class="fa fa fa-align-left fa-3x pt-2 button-doc"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip"
                    data-placement="bottom" title="Text and Picture">
                <i class="fa fa-id-card fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip"
                    data-placement="bottom" title="Picture-Slider">
                <i class="fa fa-sliders fa-3x pt-2"></i>
            </button>

            <a href="#" @click="switchLayoutsPanel()">
                <button type="button" class="btn-blue button-arrow layouts" ref="layoutsButton">
                    Show all<i class="fas fa-arrow-down ml-1"></i>
                </button>
            </a>

        </div>

        <div id="layoutsPanel" ref="layoutsPanel" :style="{ display: 'none' }">
            <p class="">Text</p>
            <hr class="mr-5">
            <div class="">
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-header fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-align-left fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-align-center fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-text-height fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-address-card-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
            </div>
            <p class="">Video</p>
            <hr class="mr-5">
            <div class="">
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-file-video-o fa-3x pt-2"></i>
                </button>
            </div>

            <p class="">Image</p>
            <hr class="mr-5">
            <div class="">
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-picture-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-slideshare fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-toggle-on fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-grav fa-3x pt-2"></i>
                </button>
            </div>

            <p class="">Other</p>
            <hr class="mr-5">
            <div class="mb-2">
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-arrows-v fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-envelope-o fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i
                    class="fa fa-puzzle-piece fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial btn-circle" type="button"><i class="fa fa-question fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial" type="button"><i class="fa fa-quote-left fa-3x pt-2"></i>
                </button>
                <button class="mr-2 btn-tutorial" type="button"><i class="fa fa-id-card fa-3x pt-2"></i>
                </button>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: [

        ],
        data() {
            return {

            };
        },
        created() {

        },
        methods: {
            switchLayoutsPanel: function() {
                this.$refs.layoutsPanel.style.display = (this.$refs.layoutsPanel.style.display === 'none') ? 'block' : 'none';
                this.$refs.layoutsButton.innerHTML = (this.$refs.layoutsPanel.style.display === 'none') ? 'Show all<i class="fas fa-arrow-down ml-1"></i>' : 'Hide<i class="fas fa-arrow-up ml-1"></i>';
            },
            addParagraphBlock: function(blockType) {
                switch (blockType) {
                    case 'normalText':
                        console.log('Need to add block of ' + blockType + ' type');
                        //now need to insert a block into blocks container
                        break;
                    default:
                        return;
                }
            }
        },
        mounted() {
            $('.tooltip-btn').tooltip();
        },
        computed: {
            computedLayoutsDisplay: function () {
                return this.layoutsDisplay;
            }
        }
    };
</script>

<style>

</style>
