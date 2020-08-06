<template>
    <div class="row">
        <div class="col-lg-12">
            <NestedDraggable :tutorials="this.tutorialsObj"
                             v-on:deleteComponent="deleteComponent"
                             v-on:displaySavedPanel="displaySavedPanel"
            ></NestedDraggable>
            <AdminListDeleteModal ref="tutorialDeleteModal"></AdminListDeleteModal>
        </div>
        <b-alert
            v-model="showBottom"
            class="position-fixed fixed-bottom m-0 rounded-0 py-3"
            style="z-index: 2000; background-color: #57bf57; color:white; text-align: center;
            text-align: -webkit-center; font-size: 24px;"

        >
            Saved
        </b-alert>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import AdminListDeleteModal from "./AdminListDeleteModal";
    import NestedDraggable from "./NestedDraggable";

    export default {
        name: "TutorialsAdminList",
        created() {
            // converting tutorials JSON prop into data object
            this.tutorialsObj = JSON.parse(this.$props.tutorials);
        },
        components: {
            AdminListDeleteModal,
            NestedDraggable,
            draggable,
        },
        props: [
            'tutorials',
        ],
        data() {
            return {
                tutorialsObj: {},
                editLink: '/module/tutorials/admin/edit/',
                showBottom: false
            }
        },
        mounted() {

        },
        methods: {
            deleteComponent: function (tutorial) {
                this.$refs.tutorialDeleteModal.setTutorial(tutorial);
            },
            displaySavedPanel: function () {
                this.showBottom = true;
                setTimeout(() => this.showBottom = false, 3000);
            },
        },
    }
</script>

<style>

    . big-arrow {
        display: inline-block;
    }

    .page-title {
        text-transform: uppercase;
        font-weight: normal;
        font-size: 1.2em;
        font-weight: 700;
        display: inline-block;
        max-width: 35vw;
    }

    .btn-admin {
        background: #fff !important;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
        color: #777777 !important;
        border-style: none;
    }

    .fas-admin {
        color: #777777 !important;
    }

    .shadow {
        font-size: 14px;
        text-transform: uppercase;
        color: #777777;

    }

    .categories {
        font-size: 14px;
        text-transform: uppercase;
        color: #777777;
    }

    .card2::after {
        display: block;
        position: absolute;
        bottom: -10px;
        left: 20px;
        width: calc(100% - 40px);
        height: 35px;
        background-color: #fff;
        -webkit-box-shadow: 0 19px 28px 5px rgba(64, 64, 64, 0.09);
        box-shadow: 0 19px 28px 5px rgba(64, 64, 64, 0.09);
        content: '';
        z-index: -1;
    }

    a.card2 {
        text-decoration: none;
    }

    .card2 {
        position: relative;
        border: 0;
        border-radius: 0;
        background-color: #fff;
        -webkit-box-shadow: 0 12px 20px 1px rgba(64, 64, 64, 0.09);
        box-shadow: 0 12px 20px 1px rgba(64, 64, 64, 0.09);
    }

    .card2 {
        position: relative;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        min-width: 0;
        background-color: #fff;
        background-clip: border-box;
        border-top: 1px solid rgba(0, 0, 0, 0.125);
    }


    img, figure {
        max-width: 100%;
        height: auto;
        vertical-align: middle;
    }


    .card-title {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
        color: #424242;

    }

    .ul-pd {
        padding-inline-start: 0 !important;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        font-size: 20px;
        line-height: 40px !important;
        color: #777777;
        text-shadow: none;
        border-radius: 5px;
        overflow: hidden;
        display: block;
        float: left;
        text-align: center;
        border: 1px solid #AAA;
    }

    .social-icon:hover {
        border: none;
    }

    .social-icon i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 1s ease;
        line-height: 40px;
        position: relative;
    }

    .social-icon i:last-child {
        color: #FFF !important;
    }

    .social-icon:hover i:first-child {
        margin-top: -40px;
        display: none;
    }

    si-border {
        border: 1px solid #AAA !important;
    }

    .si-edit:hover {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
    }

    .si-delete:hover {
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
    }


    .li-text {
        color: #424242;
        font-size: 16px;
    }

    .fa-minus-circle {
        color: #00bff9;
    }


</style>
