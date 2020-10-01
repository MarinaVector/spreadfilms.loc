<template>
    <div class="container content-txt" >

        <div class="row switch-grid my-2">
            <div class="">
                <button type="button" class="btn-icon draggable pull-left">
                    <i class="fa fa-arrows-v pt-2"></i>
                </button>

            </div>

            <div class="">
                <div class="col-lg-12 tutorial-text text-center py-5 pt-3" @click="">
                    <button class="text-button py-2 my-5 px-5 pb-3" type="button">
                        <i class="fas fa-image blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1">Image</p>
                    </button>
                </div>

                <div class="col-lg-12 py-5 tutorial-text content-txt position-relative text-center" @click="">
                    <button class="text-button btnhitxt btnhip position-absolute py-2 px-5 my-2" type="button"                          >
                        <i class="fas fa-bars blueiconcolor fa-2x">
                        </i>
                        <p class="mb-n1 mx-1">Text</p>
                    </button>
                    <div class="m-0 ml-5 position-relative" v-html=""></div>
                </div>
            </div>

            <div class="switchbtn-grid">
                <div class="">
                   <button type="button" class="btn-icon pull-right" @click="callParentDeleteParagraphBlock()">
                      <i class="fa fa-trash-o pt-2"></i>
                   </button>
                </div>
                <div class="">
                   <button type="button" class="btn-icon pull-right" @click="callParentDuplicateParagraphBlock()">
                      <i class="fa fa-files-o pt-2"></i>
                   </button>
                </div>
            </div>


        </div>
    </div>
</template>

<script>



export default {
    name: "ImageSwitch",
    components: {

    },
    props: {
        index: {
            type: Number,
            default: null
        },
        mydata: {
            type: Object,
            default: () => ({

            }),
        },
    },
    created() {

    },
    data() {
        return {

        };
    },
    methods: {


    },

    computed: {

    },
};
</script>

<style>

.switch-grid {
    display: grid;
    grid-template-columns: 1fr 3fr 1fr;
}

. switchbtn-grid {
    display: grid;
    grid-template-columns: 1fr;
    grid-template-rows: 1fr 1fr;
    gap: 0px 0px;
    grid-template-areas:
    "."
    ".";
}

</style>
