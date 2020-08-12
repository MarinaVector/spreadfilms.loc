<template>
    <div class="row h-100">
        <form method="POST" :action="action" >
            <input type="hidden" name="_token" :value="csrf"/>
            <div class="card mb-4">
                <div class="container-fluid px-4">
                    <div class="row">
                        <!-- Logo -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Logo</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'Select the Logo to be displayed in the Tutorial overview'"></question-dropdown>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div id="logo-image-preview" class="elfinder-preview-image" ref="logopreview"></div>
                                    <div class="elfinder-container">
                                        <input name="logo" id="logo-image" type="hidden"
                                               data-type="bild" data-value="image"
                                               class="elfinder-idea"
                                               v-model="tutorialsSettingsObj.logo">
                                        <button data-inputid="logo-image"
                                                class="popup_selector btn btn-default">Select image
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Logo -->

                        <!-- Title -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Main Page Title</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'This is the title for the home page of the Tutorials. Example:\n'+
    '                                                    Welcome'"></question-dropdown>
                                </div>
                            </div>
                            <input type="hidden" name="startscreen_title" v-model="tutorialsSettingsObj.startscreen_title">
                            <ckeditor :editor="editor" v-model="tutorialsSettingsObj.startscreen_title" :config="editorConfig"></ckeditor>
                        </div>
                        <!-- Title -->

                        <!-- Startscreen Button Text -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Startscreen Button Text</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'This is the Button on the home page of the Tutorials. Example: Get\n'+
    '                                                started Now'"></question-dropdown>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="startscreen_button_text" :value="tutorialsSettingsObj.startscreen_button_text" class="form-control btn-block">
                                </div>
                            </div>
                        </div>
                        <!-- Startscreen Button Text -->

                        <!-- Background -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Startscreen Background</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'This is the full screen wallpaper on the home page of Tutorials'"></question-dropdown>
                                </div>
                                <div class="col-md-12 mb-1">
                                    <div id="background-image-preview" class="elfinder-preview-image" ref="backgroundpreview"></div>
                                    <div class="elfinder-container">
                                        <input name="main_page_background" id="background-image" type="hidden"
                                               data-type="bild" data-value="image"
                                               class="elfinder-idea"
                                               v-model="tutorialsSettingsObj.main_page_background">
                                        <button data-inputid="background-image"
                                                class="popup_selector btn btn-default">Select image
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- Background -->

                        <!-- Admin Email -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Admin Email For Notes</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                </div>
                                <div class="form-group col-md-3">
                                    <input type="text" name="email_notifications_to" id="email" :value="tutorialsSettingsObj.email_notifications_to" class="form-control btn-block">
                                </div>
                            </div>
                        </div>
                        <!-- Admin Email -->

                        <!-- Chapter Done -->
                        <div class="col-md-12 vue-container mt-3">
                            <div class="row">
                                <div class="col-md-11">
                                    <p class="head-inline">Chapter Done</p>
                                </div>
                                <div class="col-md-1 mt-2 text-right">
                                    <question-dropdown
                                        :answerdropdown="'Select the color scheme of the tutorial overview here'"></question-dropdown>
                                </div>
                            </div>
                            <input type="hidden" name="chapter_complete" v-model="tutorialsSettingsObj.chapter_complete">
                            <ckeditor :editor="editor" v-model="tutorialsSettingsObj.chapter_complete" :config="editorConfig"></ckeditor>
                        </div>
                        <!-- Chapter Done -->
                    </div>
                </div>
            </div>
            <div style="min-height: 75px; border: none;"></div>
            <save-cancel-block></save-cancel-block>
        </form>
    </div>
</template>

<script>
    import cloneDeep from 'lodash/cloneDeep';
    import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

    export default {
        name: "TutorialsSettings",
        created() {
            if(undefined !== this.$props.settings){
                this.tutorialsSettingsObj = JSON.parse(this.$props.settings);
            }
        },
        mounted() {
            this.csrf = document.head.querySelector('meta[name="csrf-token"]').content;

            //setting logo picture
            if(this.tutorialsSettingsObj.logo){
                $(this.$refs.logopreview).css("background-image", "url("+this.tutorialsSettingsObj.logo+")");
                $(this.$refs.logopreview).css('height', '100%');
            }

            //setting background picture
            if(this.tutorialsSettingsObj.main_page_background){
                $(this.$refs.backgroundpreview).css("background-image", "url("+this.tutorialsSettingsObj.main_page_background+")");
                $(this.$refs.backgroundpreview).css('height', '100%');
            }
        },
        components: {

        },
        props: {
            settings: {
                type: String,
                default: () => ""
            },
            action: {
                type: String,
                default: () => ""
            },
        },
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the editor.
                },
                tutorialsSettingsObj: {},
                editLink: '/module/tutorials/settings/',
                SettingsTitle: this.$props.startscreen_title ? this.$props.startscreen_title : '',
                SettingsChapterComplete: this.$props.chapter_complete ? this.$props.chapter_complete : '',
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            }
        },
        methods: {

        },
    }
</script>

<style>
    .set-header:first-child {
        border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0;
    }

    .set-header {
        padding: .75rem 1.25rem;
        margin-bottom: 0;
        background-color: rgba(0, 0, 0, .03);
        border-bottom: 1px solid rgba(0, 0, 0, .125);
        font-size: 18px;
        color: #424242;
    }

    .vue-container {
        border: 1px solid rgba(0, 0, 0, .125);
        border-radius: 5px;
    }

    .head-inline {
        display: inline-block;
    }

    .head-inline {
        font-size: 20px;
        font-weight: bold;
        color: #424242;
        margin-bottom: 10px;
        margin-top: 10px;
    }

    .page-title {
        color: #4A494A;
        text-transform: uppercase;
        margin: 35px 45px 45px 15px;
        font-size: 1.2em;
        font-weight: 700;
        display: inline-block;
        max-width: 35vw;
    }

    .ck-editor__editable {
        min-height: 200px;
    }
</style>
