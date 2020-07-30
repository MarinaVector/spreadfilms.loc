<template>
    <div class="row">
        <div class="col-lg-12">
            <ul id="sortable">
                <draggable v-model="tutorialsObj" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs">
                    <div v-for="tutorial in tutorialsObj" class=".paragraph" ref="paragraph">
                        <li class="card2 py-2 pl-3 pl-5 li-text ui-state-default draggable">
                            <div class="row">
                                <div class="col-lg-10">
                                    <i class="fas fa-arrows-alt-v mr-2"></i>
                                    <span class="ui-icon ui-icon-arrow thick-2-n-s"></span>{{tutorial.name}}
                                </div>
                                <div class="col-lg-2 pl-5">
                                    <a :href="editLink + tutorial.id" class="social-icon si-border si-edit mr-1">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="social-icon si-border si-delete"
                                       data-toggle="modal" data-target="#modal-info">
                                        <i class="fas fa-trash"></i>
                                        <i class="fas fa-trash"></i>
                                    </a>

                                    <!--Info Modal Template-->
                                    <div id="modal-info" class="modal modal-message modal-info fade modal fade modal-open" style="display: none;" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <i class="fas fa-minus-circle fa-3x mx-auto my-3"></i>
                                                </div>
                                                <div class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete tutorial<b>{{tutorial.name}}</b> ?</div>
                                                <div class="modal-footer mx-auto">
                                                    <button type="button" class="btn button-modal button-chancel" data-dismiss="modal">Cancel</button>
                                                    <button type="button" class="btn button-modal button-ok" data-dismiss="modal">OK</button>
                                                </div>
                                            </div> <!-- / .modal-content -->
                                        </div> <!-- / .modal-dialog -->
                                    </div>
                                    <!--End Info Modal Templates-->

                                    <!-- Button trigger modal -->


                                </div>
                            </div>
                        </li>
                    </div>
                </draggable>
            </ul>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "TutorialsAdminList",
        created() {

        },
        components: {
            draggable,
        },
        props: [
            'tutorials',
        ],
        data() {
            return {
                tutorialsObj: [],
                editLink: '/module/tutorials/admin/edit/'
            }
        },
        mounted() {
            // converting tutorials JSON prop into data object
            this.tutorialsObj = JSON.parse(this.$props.tutorials);
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
