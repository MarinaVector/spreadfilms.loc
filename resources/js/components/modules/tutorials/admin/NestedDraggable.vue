<template>

            <ul id="sortable">
                <draggable v-model="tutorialDraggable" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs"
                           @update="update">
                    <li v-for="tutorial in tutorialDraggable" class=".paragraph" ref="paragraph" :id="tutorial.id">
                        <div class="card-nested py-2 li-text ui-state-default draggable">
                            <div class="row">
                                <div class="col-lg-10 col-md-9 col-6 column pl-5">
                                    <i class="fas fa-arrows-alt-v mr-1"></i>
                                    <span class="ui-icon ui-icon-arrow thick-2-n-s"></span>{{tutorial.label}}
                                </div>
                                <div class="col-lg-2 col-md-3 col-6 pl-lg-5 pl-4">
                                    <input type="hidden" name="userId" value=""/>
                                    <a :href="editLink + tutorial.id" class="nested-icon si-border mr-xl-1 mr-n2">
                                        <i class="fas fa-edit si-ed"></i>
                                        <i class="fas fa-edit si-ed"></i>
                                    </a>
                                    <a href="#" class="nested-icon si-border"
                                       data-toggle="modal" data-target="#modal-info" @click="deleteComponent(tutorial)">
                                        <i class="fas fa-trash si-del"></i>
                                        <i class="fas fa-trash si-del"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                            <nested-draggable class="ch" v-if="tutorial.children" :tutorials="tutorial.children"
                                              v-on:deleteComponent="deleteComponent"
                                              v-on:displaySavedPanel="displaySavedPanel"
                                              />
                            </div>
                        </div>
                    </li>
                </draggable>
            </ul>

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

       .card-nested {
        position: relative;
           min-width: 0;
        background-color: #fff;
        background-clip: border-box;
        border-top: 0.5px solid rgba(0, 0, 0, 0.125);
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

    .nested-icon {
        width: 40px;
        height: 40px;
        font-size: 20px;
        line-height: 40px !important;
        text-shadow: none;
        overflow: hidden;
        display: block;
        float: left;
        text-align: center;
    }


    .nested-icon i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 1s ease;
        line-height: 40px;
        position: relative;
    }

    .nested-icon i:last-child {
        color: #FFF !important;
    }

    .nested-icon:hover i:first-child {
        margin-top: -40px;
        display: none;
    }

    i.si-ed:hover {
        color: #008acb !important;
    }

     i.si-del:hover {
        color: #008acb !important;
    }

    .li-text {
        color: #424242;
        font-size: 16px;
    }

    .fa-minus-circle {
        color: #00bff9;
    }

   .ch div li div div .column .fas {
           margin-left: 18px;
            }

</style>
