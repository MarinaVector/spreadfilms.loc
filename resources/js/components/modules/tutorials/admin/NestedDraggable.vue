<template>
    <div class="row">
        <div class="col-lg-12">
            <ul id="sortable">
                <draggable v-model="tutorialDraggable" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs"
                           @update="update">
                    <div v-for="tutorial in tutorialDraggable" class=".paragraph" ref="paragraph" :id="tutorial.id">
                        <li class="card2 py-2 pl-3 pl-5 li-text ui-state-default draggable">
                            <div class="row">
                                <div class="col-lg-10">
                                    <i class="fas fa-arrows-alt-v mr-2"></i>
                                    <span class="ui-icon ui-icon-arrow thick-2-n-s"></span>{{tutorial.label}}
                                </div>
                                <div class="col-lg-2 pl-5">
                                    <input type="hidden" name="userId" value=""/>
                                    <a :href="editLink + tutorial.id" class="social-icon si-border si-edit mr-1">
                                        <i class="fas fa-edit"></i>
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="#" class="social-icon si-border si-delete"
                                       data-toggle="modal" data-target="#modal-info" @click="deleteComponent(tutorial)">
                                        <i class="fas fa-trash"></i>
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                            <nested-draggable v-if="tutorial.children" :tutorials="tutorial.children"
                                              v-on:deleteComponent="deleteComponent"
                                              v-on:displaySavedPanel="displaySavedPanel"
                                              />
                        </li>
                    </div>
                </draggable>
            </ul>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'
    import AdminListDeleteModal from "./AdminListDeleteModal";
    import cloneDeep from 'lodash/cloneDeep'

    export default {
        name: "NestedDraggable",
        created() {

        },
        components: {
            AdminListDeleteModal,
            draggable,
        },
        props: {
            tutorials: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                tutorialDraggable: [],
                editLink: '/module/tutorials/admin/edit/'
            }
        },
        mounted() {
            // converting tutorials JSON prop into data object
            this.tutorialDraggable = cloneDeep(this.tutorials)

        },
        methods: {
            deleteComponent: function (tutorial) {
                this.$emit('deleteComponent', tutorial);
            },
            update(evt){
                let tutorialID = evt.clone.id; // dragged tutorial ID
                let oldIndex = evt.oldIndex;  // element's old index within old parent
                let newIndex = evt.newIndex;  // element's new index within new parent

                let data = {
                    tutorialID: tutorialID,
                    oldIndex: oldIndex,
                    newIndex: newIndex
                };

                axios.post('/module/tutorials/admin/change-order',{ params: data})
                    .then((response) => {
                        this.displaySavedPanel();
                    })
                    .catch(error => {});
            },
            displaySavedPanel(){
                this.$emit('displaySavedPanel');
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
