<template>
    <div class="container-fluid" id="display-container pt-3">
        <div class="navigation-inner">
            <div class="row my-3">
                    <nav class="col-lg-9 col-md-7 col-5">
                        <div class="ml-md-5 ml-2">
                        <template v-for="(breadcrumb, index) in breadcrumbObj">
                                <template v-if="index != breadcrumbObj.length - 1">
                                    <a :href="'/module/tutorials/view/' + breadcrumb.id">{{breadcrumb.name}}</a>
                                </template>

                                <template v-else>
                                    <li class="breadcrumb-item active" aria-current="page">{{breadcrumb.name}}</li>
                                </template>
                            </template>
                            <!--<li class="breadcrumb-item active" aria-current="page">Data</li>-->
                        </div>
                    </nav>

                <div class="col-lg-1 col-md-3 col-5 ml-n3">
                    <button class="prev nav-button">
                            <span class="button-inner">
                                <i class="fas fa-angle-left"></i>
                            </span>
                    </button>
                    <button class="prev nav-button">
                            <span class="button-inner">
                                <i class="fas fa-angle-right"></i>
                            </span>
                     </button>
                </div>
                <div class="col-lg-2 col-2 ml-n4">
                        <button class="btn btn-primary note-trigger">
                            <span class="button-inner d-none d-md-block">Notice &nbsp;
                                <i class="far fa-edit edit-note"></i>
                            </span>
                            <i class="far fa-edit edit-note d-md-none"></i>
                        </button>
                </div>
            </div>
        </div>

        <div class="col-ttr menucolumn py-3 px-lg-5 mt-3 container-fluid">
            <div class="tutorial-read tutorial-navigation">
                    <div class="mt-4 bg-light p-lg-5 mx-auto nav-fill">
                        <div v-for="(paragraph, index, mydata) in paragraphs" class=".paragraph" ref="paragraph">
                            <component
                                :index="index"
                                :key="index"
                                :is=paragraph.component
                                :mydata="paragraph.component.mydata"
                                someProps="testing props"
                            />
                        </div>
                    </div>
            </div>

            <footer class="up-read py-3 mb-n3">
                <div id="footer">
                    <div class="navigation-inner">
                        <div class="row my-3">
                            <div class="col-lg-1 offset-lg-9 col-5">
                                <button class="prev nav-button">
                                     <span class="button-inner">
                                     <i class="fas fa-angle-left"></i>
                                     </span>
                                </button>
                                <button class="prev nav-button">
                                      <span class="button-inner">
                                     <i class="fas fa-angle-right"></i>
                                      </span>
                                </button>
                            </div>

                            <div class="col-md-2 col-7">
                                <button class="btn btn-primary close-tutorial" @click="completeTutorial(tutorialObj.id)">
                                    <span class="button-inner">Complete tutorial</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <CompleteTutorialModal :logoSrc="logoVal" ref="CompleteTutorialModalRef"></CompleteTutorialModal>
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
import CompleteTutorialModal from './modal-windows/CompleteTutorialModal'
import cloneDepp from 'lodash/cloneDeep'

export default {
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
        QuestionsAnswers,
        CompleteTutorialModal,
    },
    name: 'DisplayTutorial',
    props: [
        'tutorial',
        'breadcrumb',
    ],
    data() {
        return {
            tutorialObj: {},
            breadcrumbObj: {},
            paragraphs: [],
            logoVal: this.logo ? this.logo : '/public/img/logo_white.png',
            isOpen: false,
            displayMode: 'none'
        }

    },
    created() {
        if (undefined !== this.tutorial) {
            this.tutorialObj = JSON.parse(this.$props.tutorial)
            /*this.tutorialObj = this.tutorial.map(item => {
                //item.active = false
                return item
            });*/
        }

        if (undefined !== this.breadcrumb) {
            this.breadcrumbObj = JSON.parse(this.$props.breadcrumb)
        }
    },
    mounted() {
        if (this.tutorialObj.paragraphs) {
            this.tutorialObj.paragraphs.forEach((paragraph) => {
                this.addParagraphBlock(paragraph.paragraph_type, paragraph.data);
            });
        }
    },
    methods: {
        toggleModal: function () {
            this.isOpen = !this.isOpen;
            this.displayMode = this.isOpen ? 'block' : 'none';
        },
        completeTutorial(tutorialId) {
            let data = {
                tutorialId: tutorialId,
            };

            axios.post('/module/tutorials/complete',{ params: data})
                .then((response) => {
                    let element = this.$refs.CompleteTutorialModalRef.$el;
                    this.$refs.CompleteTutorialModalRef.nextTutorialLink += response.data.nextTutorialId;
                    this.$refs.CompleteTutorialModalRef.username = response.data.userName;
                    $(element).modal('show');
                })
                .catch(error => {});
        },
        addParagraphBlock(paragraphName, paragraphData = null) {
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
        },
    }
}
</script>

<style>

.navigation-inner {
    width: calc(100% - 20px);
}

.navigation-inner {
    height: 70px;
    float: left;
    width: 100%;
    background: #fff;
    position: relative;
    border: solid 1px #dcdcdc;
}

.breadcrumbs {
    left: 20px;
    top: 50%;
    transform: translateY(-50%);
    position: absolute;
    font-size: 16px;
}

.nav-round-button {
    right: 110px;
}

.nav-round-button {
    position: absolute;
    right: 130px;
    top: 50%;
    transform: translateY(-50%);
}

.nav-button {
    display: inline-block;
    background: #ddd;
    border-radius: 100%;
    padding: 10px 14px;
    text-align: center;
    border: none;
    color: #fff;
    vertical-align: middle;
    outline: none;
}

.breadcrumbs span:last-child {
    color: #2096ff;
    font-weight: bold;
}

#footer {
    bottom: 0;
    width: 100%;
}

#display-container {
    display: grid;
    grid-template-rows: 80px 1fr 80px;
    gap: 10px;
    margin: 0;
}

.tutorial-read {
    width: 100%;
    overflow: auto;
    height: calc(100vh - 250px);

}

div .up-read {
    height: 100px;
}

.popup-custom {
    opacity: 1;
    z-index: 123345;
}

.popup-custom {
    border-radius: 10px;
    position:relative;
    z-index: 99999;
    width: 400px;
    background: #fff;
    overflow: hidden;
    transform: translate3d(85%, -150%, 0);
}

.popup-custom {
    transition: opacity .15s ease-in-out;
}

.popup-content {
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    position: relative;
}

.theme-background-horizontal {
    background: linear-gradient( -45deg,#05ffa3,#2096ff 50%);
    color: #fff;
}

.popup-text-content {
    font-size: 2em;
    text-transform: uppercase;
    padding: 20px 0 30px;
    font-weight: 100;
    line-height: 1em;
}

.popup-content {
    padding: 30px;
    border-radius: 10px;
    text-align: center;
    position: relative;
}

.small {
    font-weight: inherit;
    font-size: 0.8rem;
    line-height: 1.5em;
    text-transform: none;
}

.btn-def {
    background: transparent;
    border: 1px solid;
    color: #fff;
    margin-right: 25px;
    font-size: .8em;
    text-transform: none;
    min-width: 130px;
    cursor: pointer;
}

.btn-def:hover {
    background: #fff;
    color: #333;
    border-color: #fff;
}

    .btn-arr {
            width: 38px;
            height: 38px;
            border-radius: 19px;
            text-align: center;
            padding-left: 0;
            padding-right: 0;
            font-size: 16px;
              background-color: gray;
    }

    .edit-note {
        font-size: 22px;
    }

@media only screen and (max-width: 800px) {
    .nav-button {
        display: inline-block;
        background: white;
        text-align: center;
        border: none;
        color: #ddd;
        vertical-align: middle;
        outline: none;
        font-size: 20px;
    }

    .navigation-inner {
        margin-top: 20px;
    }
    }

</style>
