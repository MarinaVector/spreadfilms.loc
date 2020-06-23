<template>
    <div class="container inner-menu mt-3 pt-1">
        <div class="mt-3 mb-3">
            <a href="#">
                <button type="button" class="btn-blue layouts">
                    Layouts filters<i class="fas fa-filter ml-1"></i>
                </button>
            </a>

            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip" data-placement="bottom" title="Video">
                <i class="fa fa-file-video-o fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle new-text" type="button" data-toggle="tooltip" data-placement="bottom" title="Video with Background">
                <i class="fa fa-file-video-o fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip" data-placement="bottom" title="Normal Text">
                <i class="fa fa fa-align-left fa-3x pt-2 button-doc"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip" data-placement="bottom" title="Text and Picture">
                <i class="fa fa-id-card fa-3x pt-2"></i>
            </button>
            <button class="mr-2 btn-tutorial tooltip-btn btn-circle" type="button" data-toggle="tooltip" data-placement="bottom" title="Picture-Slider">
                <i class="fa fa-sliders fa-3x pt-2"></i>
            </button>

            <a href="#" onclick="switchLayoutsPanel('layouts-panel'); return false">
                <button type="button" class="btn-blue button-arrow layouts">
                    Show all<i class="fas fa-arrow-down ml-1"></i>
                </button>
            </a>

        </div>

        <div id="layouts-panel" style="display: none;">
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

    import {SidebarMenu} from 'vue-sidebar-menu';

    const separator = {
        template: `<hr style="border-color: #D4D4D4; margin: 15px 0;">`
    };

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

        },
        mounted() {
            $('.tooltip-btn').tooltip();
        },
        components: {

        }
    };

</script>

<style>

</style>
