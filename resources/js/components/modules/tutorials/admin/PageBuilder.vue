<template>
    <div class="container form-group paragraph-form-group">
        <form class="no-bottom" method="POST" :action="action" @submit.prevent="submitForm" ref="form"
              id="tutorial-builder-form">
            <input type="hidden" name="_token" :value="csrf"/>
            <input type="hidden" name="tutorial_id" :value="tutorialObj.id"/>
            <layouts-panel v-on:addParagraphBlock="addParagraphBlock"></layouts-panel>
            <!-- Tutorial Name Block -->
            <div class="container group mt-5">

                <div class="row mb-2">
                    <div class="col-lg-12 mt-5">
                        <label class="tutorial-name" for="tutorial_name">Name</label>
                        <input class="input-hidden form-control" type="text" required
                               placeholder="New Tutorial"
                               name="tutorial_name"
                               id="tutorial_name"
                               v-model="tutorialObj.name"
                        >
                    </div>
                </div>
            </div>
            <!-- Tutorial Name Block -->

            <!-- Default Page Block with PageBuilderParagraphBlocks -->
            <div class="container group py-lg-5 mt-lg-2 ml-2 ml-lg-0">
                <h2 v-if="paragraphs.length == 0" class="empty-paragraphs-message pb-3 pt-5 text-justify">Currently the Tutorial is still
                    without content, modules can be
                    selected above or a template can be loaded</h2>
                <draggable v-model="paragraphs" @start="drag=true" @end="drag=false" handle=".draggable"
                           ref="paragraphs">
                    <div v-for="(paragraph, index, mydata) in paragraphs" class=".paragraph" ref="paragraph">
                        <component
                            v-on:deleteParagraph="deleteParagraph(index)"
                            v-on:duplicateParagraph="duplicateParagraph(index)"
                            v-on:getParagraphData="getParagraphData(index)"
                            v-on:saveParagraphData="saveParagraphData"
                            :index="index"
                            :blocksCounterID="blocksCounterID"
                            :key="index"
                            :is=paragraph.component
                            :mydata="paragraph.component.mydata"
                        />
                    </div>
                </draggable>
            </div>
            <!-- Default Page Block with PageBuilderParagraphBlocks -->

            <!-- Tutorial Background Image -->
            <div class="container group">
                <div class="panel-heading row">
                    <div class="col-lg-11">
                        <div class="panel-title block-title">Background image for Tutorial Overview</div>
                    </div>
                    <div class="col-lg-1 pl-5 pl-2">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-6">
                                <question-dropdown :answerdropdown="'Currently the Tutorial is still without content, modules can ' +
                         'be selected above or a template\n'+
    '                            can be loaded'"></question-dropdown>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="elfinder-preview-image" id="background-tutorial-image-preview"></div>
                    <div class="elfinder-container">
                        <input id="background-tutorial-image" class="elfinder-idea" name="tutorial_background"
                               type="hidden" :value="tutorialObj.tutorial_background"/>
                        <button data-inputid="background-tutorial-image" class="popup_selector btn btn-default">
                            Select Wallpaper
                        </button>
                    </div>
                </div>
            </div>
            <!-- Tutorial Background Image -->

            <!-- Parent Tutorial, Categories and Visibility Blocks -->
            <div class="row mb-5 pb-5">
                <!-- Parent Tutorial Column -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading panel-list row mx-1">
                            <div class="col-lg-11">
                                <div class="panel-title block-title">Parent Topic</div>
                            </div>
                            <div class="col-lg-1">
                                <question-dropdown
                                    :answerdropdown="'Choose a Tutorial that acts as a parent Tutorial'"></question-dropdown>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body block-title">
                       <tutorials-topics :tutorials="this.$props.tutorials"
                                         :parentTutorialId="tutorialObj.parent_tutorial_id"></tutorials-topics>
                    </div>
                </div>
                <!-- Parent Tutorial Column -->

                <!-- Categories Column -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class=" panel-heading panel-list row mx-1">
                            <div class="col-lg-11">
                                <div class="panel-title block-title">Categories</div>
                            </div>
                            <div class="col-lg-1">
                                <question-dropdown
                                    :answerdropdown="'Choose a Tutorial that acts as a parent Tutorial'"></question-dropdown>
                            </div>
                        </div>
                    </div>

                    <div class="panel-body">
                       <tutorials-categories :usercompanycategories="this.$props.usercompanycategories"
                                             :categories="selectedCategories"
                       ></tutorials-categories>
                    </div>
                </div>
                <!-- Categories Column -->

                <!-- Users Assign -->
                <div class="col-lg-12 mt-2">
                    <div class="panel-default panel">
                        <div class="panel-heading panel-list row mx-1">
                            <div class="col-lg-11">
                                <div class="panel-title block-title">
                                    <span data-toggle="collapse" data-target="#collapse-staff">
                                        Users assign
                                    </span>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <span data-toggle="collapse" class="ml-2 pull-right arrow-toggler"
                                      data-target="#collapse-staff"
                                      aria-expanded="true">
                                </span>
                                <div class="ml-5">
                                    <question-dropdown
                                        :answerdropdown="'Make the Tutorial visible to all or only selected users'"></question-dropdown>
                                </div>
                            </div>
                        </div>
                        <div class="custom-checkbox">
                            <label for="assign_to_all" class="btn-check btn-block pl-2 py-2 mb-2"
                                   @click="assignTo($event, 'all')">
                                <input class="custom-control-input" type="checkbox" name="assign_to_all"
                                       id="assign_to_all">
                                <div class="stlchek  mb-1 mr-1"></div>
                                Make visible to <b>all</b>
                            </label>
                        </div>

                        <div class="panel-body collapse mt-3" id="collapse-staff">
                            <div class="custom-checkbox" v-for="(role, index) in usercompanyrolesArr">
                                <label :for="'assign_to_' + role.name" class="btn-check btn-block pl-2 py-2 mb-1"
                                       @click="assignTo($event, role.name)">
                                    <input class="panel-title block-title custom-control-input" type="checkbox"
                                           :name="'assign_to_' + role.name" :id="'assign_to_' + role.name">
                                    <div class="stlchek mb-1 mr-1"></div>
                                    Make visible to all users with role <b>"{{role.name}}"</b>
                                </label>
                            </div>
                            <div class="form-group mt-3">
                                <table class="table mt-2">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th class="text-center">E-Mail</th>
                                        <th class="text-right">Assign</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-for="(user, index) in usercompanyusersArr">
                                        <td>{{user.firstname}}</td>
                                        <td class="text-center">{{user.email}}</td>
                                        <td class="flex-column text-right">
                                            <div class="custom-checkbox btn-group1">
                                                <label class="btn btn-sm btn-check">
                                                    <input type="checkbox" :name="'assignee[' + user.id + ']'"
                                                           class="user_assign_cb custom-control-input"
                                                           :data-roles="companyrolesList(user.companyroles)"
                                                           :checked="assigneesArr.includes(user.id) ? 'checked' : ''"
                                                    >
                                                    <div class="stlchek m-1"></div>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Parent Topic and Categories Block -->
            <save-cancel-block></save-cancel-block>
        </form>
    </div>

</template>

<script>
    import NormalText from './paragraphs/NormalText'
    import Video from './paragraphs/Video'
    import TextImg from './paragraphs/TextImg'
    import SliderAdd from './paragraphs/SliderAdd'
    import BackgroundVideo from './paragraphs/BackgroundVideo'
    import SimpleHead from './paragraphs/SimpleHead'
    import draggable from 'vuedraggable'
    import Quote from './paragraphs/Quote'
    import ImgHeadText from './paragraphs/ImgHeadText'
    import LgHeadText from './paragraphs/LgHeadText'
    import TextLogo from './paragraphs/TextLogo'
    import TextImgHigh from './paragraphs/TextImgHigh'
    import Contact from './paragraphs/Contact'
    import QuestionsAnswers from './paragraphs/QuestionsAnswers'
    import cloneDepp from 'lodash/cloneDeep'

    export default {
        props: [
            'usercompanycategories',
            'usercompanyroles',
            'usercompanyusers',
            'action',
            'tutorials',
            'tutorial',
            'paragraphsJSONProp',
        ],
        data() {
            return {
                paragraphsStructure: {
                    //Text Layouts
                    Headline: {
                        header: {
                            searchBy: 'class',
                            search: '.headline',
                            tagName: 'input'
                        },
                    },
                    NormalText: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    CenterText: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    TextWithBigFont: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    TextWithLogo: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    TextImg: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                        src: {
                            searchBy: 'class',
                            search: '.component_image',
                            tagName: 'input'
                        },
                    },
                    TxtSpecialImg: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    TextWithHighImage: {
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    //Text Layouts

                    //Video Layouts
                    Video: {
                        banner: {
                            searchBy: 'class',
                            search: '.video_banner',
                            tagName: 'input'
                        },
                        videoUrl: {
                            searchBy: 'class',
                            search: '.video_url',
                            tagName: 'input'
                        },
                        dimension: {
                            searchBy: 'class',
                            search: '.video_dimension',
                            tagName: 'input'
                        },
                        notices: {
                            searchBy: 'class',
                            search: '.video_notices',
                            tagName: 'input'
                        },
                    },
                    bgVideo: {
                        background: {
                            searchBy: 'class',
                            search: '.video_background',
                            tagName: 'input'
                        },
                        banner: {
                            searchBy: 'class',
                            search: '.video_banner',
                            tagName: 'input'
                        },
                        videoUrl: {
                            searchBy: 'class',
                            search: '.video_url',
                            tagName: 'input'
                        },
                        dimension: {
                            searchBy: 'class',
                            search: '.video_dimension',
                            tagName: 'input'
                        },
                        notices: {
                            searchBy: 'class',
                            search: '.video_notices',
                            tagName: 'input'
                        },
                    },
                    VideoWithText: {
                        banner: {
                            searchBy: 'class',
                            search: '.video_banner',
                            tagName: 'input'
                        },
                        videoUrl: {
                            searchBy: 'class',
                            search: '.video_url',
                            tagName: 'input'
                        },
                        dimension: {
                            searchBy: 'class',
                            search: '.video_dimension',
                            tagName: 'input'
                        },
                        notices: {
                            searchBy: 'class',
                            search: '.video_notices',
                            tagName: 'input'
                        },
                        header: {
                            searchBy: 'class',
                            search: '.normal_text_header',
                            tagName: 'input'
                        },
                        text: {
                            searchBy: 'class',
                            search: '.normal_text_body',
                            tagName: 'input'
                        },
                    },
                    VideoSlider: {
                        banner: {
                            searchBy: 'class',
                            search: '.video_banner',
                            tagName: 'input'
                        },
                        videoUrl: {
                            searchBy: 'class',
                            search: '.video_url',
                            tagName: 'input'
                        },
                        dimension: {
                            searchBy: 'class',
                            search: '.video_dimension',
                            tagName: 'input'
                        },
                        notices: {
                            searchBy: 'class',
                            search: '.video_notices',
                            tagName: 'input'
                        },
                    },
                    //Video Layouts

                    //Image Layouts
                    Image: {
                        src: {
                            searchBy: 'class',
                            search: '.image_src',
                            tagName: 'input'
                        },
                    },
                    ImageSlider: {
                        images: {
                            searchBy: 'class',
                            search: '.images',
                            tagName: 'input'
                        },
                    },
                    ImageSwitch: {
                        imageBefore: {
                            searchBy: 'class',
                            search: '.image_before',
                            tagName: 'input'
                        },
                        imageAfter: {
                            searchBy: 'class',
                            search: '.image_after',
                            tagName: 'input'
                        },
                        textBefore: {
                            searchBy: 'class',
                            search: '.text_before',
                            tagName: 'input'
                        },
                        textAfter: {
                            searchBy: 'class',
                            search: '.text_after',
                            tagName: 'input'
                        },
                    },
                    Icons: {
                        src: {
                            searchBy: 'class',
                            search: '.image_src',
                            tagName: 'input'
                        },
                    },
                    //Image Layouts
                },
                paragraphs: [],
                blocksCounterID: 0,
                usercompanycategoriesObj: {},
                usercompanyrolesArr: [],
                usercompanyusersArr: [],
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                tutorialObj: {},
                selectedCategories: '',
                assigneesArr: [],
                ComponentData: null,
            };
        },
        created() {
            if(undefined !== this.$props.tutorial){
                this.tutorialObj = JSON.parse(this.$props.tutorial);
            }

            //forming selected categories string with comma separator
            let categoriesArr = [];
            if(undefined !== this.tutorialObj.categories){
                this.tutorialObj.categories.forEach(function(category){
                    categoriesArr.push(category['id']);
                });
                this.selectedCategories = categoriesArr.join(',')
            }

            //forming assignees array
            let assigneesArray = [];
            if(undefined !== this.tutorialObj.assignees){
                this.tutorialObj.assignees.forEach(function(user){
                    assigneesArray.push(user['id']);
                });
                this.assigneesArr = assigneesArray;
            }


        },
        mounted() {
            // converting usercompanyroles JSON prop into data object
            this.usercompanyrolesArr = JSON.parse(this.$props.usercompanyroles);

            // converting usercompanyusers JSON prop into data object
            this.usercompanyusersArr = JSON.parse(this.$props.usercompanyusers);

            if(undefined !== this.tutorialObj.tutorial_background){
                $('#background-tutorial-image-preview').css("background-image", "url("+this.tutorialObj.tutorial_background+")");
                $('.elfinder-preview-image').css('height', '100%');
            }

            if(this.tutorialObj.paragraphs){
                this.tutorialObj.paragraphs.forEach(paragraphElement => {
                    this.addParagraphBlock(paragraphElement.paragraph_type, paragraphElement.data);
                });
            }
            console.log(this.tutorialObj);
        },
        methods: {
            addParagraphBlock(paragraphName, paragraphData = {}) {
                let Component = null;
                switch (paragraphName) {
                    //Text Layouts
                    case 'Headline':
                        Component = cloneDepp(SimpleHead);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'NormalText':
                        Component = cloneDepp(NormalText);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'CenterText':
                        Component = cloneDepp(CenterText);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'TextWithBigFont':
                        Component = cloneDepp(ImgHeadText);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'TextWithLogo':
                        Component = cloneDepp(LgHeadText);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'TextImg':
                        Component = cloneDepp(TextImg);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'TxtSpecialImg':
                        Component = cloneDepp(TextLogo);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'TextWithHighImage':
                        Component = cloneDepp(TextImgHigh);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    //Text Layouts

                    //Video Layouts
                    case 'Video':
                        Component = cloneDepp(Video);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'bgVideo':
                        Component = cloneDepp(BackgroundVideo);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'VideoWithText':
                        Component = cloneDepp(VideoWithText);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'VideoSlider':
                        Component = cloneDepp(VideoSlider);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    //Video Layouts

                    //Image Layouts
                    case 'Image':
                        Component = cloneDepp(Image);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'ImageSlider':
                        Component = cloneDepp(ImageSlider);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'ImageSwitch':
                        Component = cloneDepp(ImageSwitch);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'Icons':
                        Component = cloneDepp(Icons);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    //Image Layouts

                    //Other Layouts
                    case 'SeparatorLine':
                        Component = cloneDepp(SeparatorLine);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'ContactPerson':
                        Component = cloneDepp(ContactPerson);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'MultipleChoice':
                        Component = cloneDepp(MultipleChoice);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'FAQs':
                        Component = cloneDepp(FAQs);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'Quote':
                        Component = cloneDepp(Quote);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'Header':
                        Component = cloneDepp(Header);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'Footer':
                        Component = cloneDepp(Footer);
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    //Other Layouts

                    default:
                        return;
                }
                Component = null;
                this.ComponentData = null;
                this.blocksCounterID += 1;

                this.$store.commit('updateParagraphs', {paragraphs: this.paragraphs});
                //console.log(this.$store.state.paragraphs);
            },
            deleteParagraph(index) {
                this.paragraphs.splice(index, 1);
            },
            duplicateParagraph(index) {
                this.paragraphs.push(this.paragraphs[index]);
            },
            assignTo(event, role) {
                if (role === 'all') {
                    $('input:checkbox').not(this).prop('checked', event.target.checked);
                } else {
                    $('input:checkbox.user_assign_cb').not(this).each(function () {
                        if ($(this).attr('data-roles').includes(role)) {
                            $(this).prop('checked', event.target.checked)
                        }
                    });
                }
            },
            companyrolesList(rolesArr) {
                let rolesList = [];

                rolesArr.map(function (value, key) {
                    rolesList.push(value.name);
                });

                return rolesList.join(", ");
            },
            submitForm(event) {
                const data = {};
                let paragraphs = {};
                let myForm = document.getElementById('tutorial-builder-form');
                let action = $(myForm).attr('action');

                let formData = new FormData(myForm);

                // gather all form data
                for (let [key, val] of formData.entries()) {
                    Object.assign(data, {[key]: val});
                }

                let x = 0;
                //looping through all paragraph blocks
                if (this.$refs.paragraph) {
                    this.$refs.paragraph.forEach(paragraphElement => {
                        let paragraph = {};
                        let ComponentType = $(paragraphElement).find('.component_type').val();
                        paragraph['ComponentType'] = ComponentType;

                        for (let key in this.paragraphsStructure[ComponentType]) {
                            let value = $(paragraphElement).find(this.paragraphsStructure[ComponentType][key]['search']).val();
                            paragraph[key] = value;
                        }
                        //paragraphs.push(paragraph);
                        Object.assign(paragraphs, {[x]: paragraph});
                        x++;
                    });
                }

                let paragraphsJSON = JSON.stringify(paragraphs);

                Object.assign(data, {'paragraphsJSON': paragraphsJSON});

                /*axios.post('https://spreadfilms.loc/module/tutorials/admin/add',{ params: data})
                    .then(response => this.responseData = response.data)
                    .catch(error => {});*/

                this.redirectToUrl(action, data, 'POST');
            },
            redirectToUrl(url, data, method) {
                let form = document.createElement('form');
                document.body.appendChild(form);
                form.method = method;
                form.action = url;
                for (let name in data) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = data[name];
                    form.appendChild(input);
                }
                form.submit();
            },
            getParagraphData(index) {
                return 'hello nigga';
            },
            saveParagraphData(mydata){
                //console.log(this.paragraphs[mydata.index]);
                this.paragraphs[mydata.index].component.mydata = mydata.myData;
            },
        },
        components: {
            NormalText,
            Video,
            TextImg,
            SliderAdd,
            draggable,
            BackgroundVideo,
            SimpleHead,
            Quote,
            ImgHeadText,
            LgHeadText,
            TextLogo,
            TextImgHigh,
            Contact,
            QuestionsAnswers
        },
    };

</script>

<style>

    .paragraph-form-group {
        margin-block-end: 0 !important;
        bottom: 0 !important;
        margin: 0 auto !important;
        margin-bottom: 0 !important;
    }

    .form-control {
        font-size: 14px;
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        color: #777777;
        border: 0;
        padding: 0 15px;
    }

    .input-hidden {
        font-size: 15px;
        color: #777777;
        padding: 10px 10px 10px 5px;
        display: block;
        border: none;
    }

    .input-hidden:focus {
        outline: none;
    }

    .panel-title {
        font-size: 18px;
    }

    .panel {
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }


    div.admin-description {
        float: right;
        position: absolute;
        margin-bottom: 5px;
        opacity: 0.5;
        cursor: help;
        top: 5px;
        right: 5px;
    }

    .elfinder-container {
        position: relative;
        border: 2px dashed #ddd;
        border-top-color: rgb(221, 221, 221);
        border-top-style: dashed;
        border-top-width: 2px;
        border-right-color: rgb(221, 221, 221);
        border-right-style: dashed;
        border-right-width: 2px;
        border-bottom-color: rgb(221, 221, 221);
        border-bottom-style: dashed;
        border-bottom-width: 2px;
        border-left-color: rgb(221, 221, 221);
        border-left-style: dashed;
        border-left-width: 2px;
        border-image-source: initial;
        border-image-slice: initial;
        border-image-width: initial;
        border-image-outset: initial;
        border-image-repeat: initial;
        background: #f1f1f1;
        border-radius: 7px;
        text-align: center;
        padding: 20px;
    }

    .elfinder-preview-image {
        background-size: cover;
        background-position: center;
    }

    *, ::after, ::before {
        box-sizing: border-box;
    }

    user agent stylesheet
    div {
        display: block;
    }

    .panel-heading {

        padding: 10px 15px;
        background: #FFFFFF;
        border-radius: 0;
        border: 0;
        position: relative;
    }

    .panel-title {
        font-size: 18px;
        font-weight: bold;
    }

    .empty-paragraphs-message {
        padding: 50px 20px;
        background: repeating-linear-gradient(45deg, #efefef, #efefef 10px, #fefefe 10px, #fefefe 20px);
        border-radius: 3px;
    }

    .inner-menu {
        background: #ECECEC;
        text-align: left;
        border: solid 1px #aaa;
        border-top: none;
    }

    .layouts {
        font-size: 0.85em;
        padding: 5px 15px 5px 20px;
        display: inline-block;
        vertical-align: bottom;
        margin-bottom: 12px;
        border-radius: 3px;
        background-color: #2dc3e8 !important;
        border-color: #2dc3e8;
        color: #fff;
    }

    .float-e-margins .btn {
        margin-bottom: 5px;
    }

    .btn-icon {
        background-color: #2dc3e8 !important;
        border-color: #2dc3e8;
        color: #fff;
        border: none;
        top: 20px;
        width: 40px;
        height: 40px;
        border-radius: 5px;
        text-align: center;
        line-height: 40px;
        cursor: pointer;
    }

    .blueiconcolor {
        color: #2dc3e8 !important;
    }

    select.select-tutorial {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        min-width: 200px;
        color: #333;
        border: solid #ccc 1px;
        border-radius: 0;
    }

    .tutorial-name {
        font-size: 16px;
        color: #424242;
    }

    .empty-paragraphs-message {
        font-size: 32px;
        color: #424242;
        font-weight: normal;
        padding: 10px 40px;
    }

    .block-title {
        color: #424242;
    }

    .elfinder-preview-image {
        background-size: cover;
        background-position: center;
        max-height: 200px;
    }

    .arrow-toggler.active::after {
        content: "▲";
    }

    .arrow-toggler::after {
        content: "▼";
        position: absolute;
        left: 44px;
        top: 0px;
        font-weight: normal;
    }

    .arrow-toggler {
        cursor: pointer;
    }

    .panel-list {
        border: 0;
        padding: 10px 15px;
    }


    .panel .form-control, .panel .form-control:focus, .card .form-control,
    .card .form-control:focus, .card .form-control[type="email"], .card
    .form-control[readonly] {
        background: #f2f2f2;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
    }

    .panel-list:after {
        content: "";
        background: -moz-linear-gradient(90deg, #232323 0%, #858585 100%);
        background: -webkit-linear-gradient(90deg, #232323 0%, #858585 100%);
        background: linear-gradient(90deg, #232323 0%, #858585 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#232323',
        endColorstr='#858585', GradientType=1);
        width: 100%;
        height: 2px;
        display: block;
        position: absolute;
        left: 0;
        bottom: -2px;
    }

    .panel {
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

    }

    .form-make {
        font-size: 14px;
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        color: #777777;
        border: 0;
        padding: 0 15px;
    }

    tr {
        background-color: transparent;
    }

    .btn-check {
        display: table;
        margin: auto;
        background-color: #fff;
        border: 1px solid #ccc !important;
        box-shadow: 0 12px 20px 1px rgba(64, 64, 64, .11);
    }


    @media only screen and (max-width: 576px) {

        .empty-paragraphs-message {
            font-size: 22px;
            padding: 5px 10px;
        }
    }

</style>
