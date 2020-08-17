<template>
    <div class="container-fluid" id="display-container">

        <div class="up-read py-3 px-5">
            <div id="header">
                <div class="navigation-inner mb-5">
<span class="breadcrumbs">
<span class="navbar-text">Welcome</span>
/

<span class="">Magik</span>
</span>
                    <span class="nav-round-button ml-5">
<button class="prev nav-button">
<span class="button-inner">
<i class="fas fa-angle-left"></i>
</span>
</button>
<button class="next nav-button">
<span class="button-inner"><i class="fas fa-angle-right"></i></span>
</button>
<button class="btn btn-primary note-trigger">
<span class="button-inner">Notice &nbsp;
<i class="far fa-edit"></i>
</span>
</button>
</span>
                </div>
            </div>
        </div>

        <!--   <div class="tutorial-navigation  tutorial-read">
             <div class="middle-read bg-light container">
                 <div class="mb-0">
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
             </div>
             -->


        <!--  *TEST BOOTSTRAP*
               <div data-spy="scroll" data-target="" data-offset="0" class="test-1">
                   <h4 id="fat">@fat</h4>
                   <p>...</p>
                   <h4 id="mdo">@mdo</h4>
                   <p>...</p>
                   <h4 id="one">one</h4>
                   <p>...</p>
                   <h4 id="two">two</h4>
                   <p>...</p>
                   <h4 id="three">three</h4>
                   <p>...</p>
               </div>
       -->

        <div class="col-ttr menu-column py-3 px-5 mt-3 container">
            <div class="menu-column">
                <div class="tutorial-read tutorial-navigation">
                    <div class="mt-4 bg-light p-5 mx-auto nav-fill">
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
            </div>
        </div>


        <footer class="up-read py-3 px-5 mb-n3">
            <div id="footer">
                <div class="navigation-inner">
       <span class="nav-round-button">
       <button class="prev nav-button">
       <span class="button-inner">
       <i class="fas fa-angle-left">
       </i>
       </span>
       </button>
       <button class="btn btn-primary close-tutorial">
       <span class="button-inner">Complete this tutorial</span>
       </button>
       </span>
                </div>
            </div>
        </footer>


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
    name: 'DisplayTutorial',
    props: ['tutorial'],
    data() {
        return {
            tutorialObj: {},
            paragraphs: [],
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


    },
    mounted() {
        if (this.tutorialObj.paragraphs) {
            this.tutorialObj.paragraphs.forEach((paragraph) => {
                this.addParagraphBlock(paragraph.paragraph_type, paragraph.data);
            });
        }
    },
    methods: {
        completeTutorial(index) {
            console.log('Congratulations, you did it!');
        },
        addParagraphBlock(paragraphName, paragraphData = null) {
            let Component = null;
            switch (paragraphName) {
                case 'NormalText':
                    Component = cloneDepp(NormalText);
                    if (null !== paragraphData) {
                        Component.mydata = paragraphData;
                    }
                    this.paragraphs.push({component: Component});
                    break;
                case 'video':
                    this.paragraphs.push({component: Video});
                    break;
                case 'TxtImg':
                    Component = cloneDepp(TextImg);
                    if (null !== paragraphData) {
                        Component.mydata = paragraphData;
                    }
                    this.paragraphs.push({component: Component});
                    break;
                case 'slider':
                    this.paragraphs.push({component: SliderAdd});
                    break;
                case 'bgVideo':
                    this.paragraphs.push({component: BackgroundVideo});
                    break;
                case 'simpleHead':
                    this.paragraphs.push({component: SimpleHead});
                    break;
                case 'quote':
                    this.paragraphs.push({component: Quote});
                    break;
                case 'spImgText':
                    this.paragraphs.push({component: ImgHeadText});
                    break;
                case 'lgHeadText':
                    this.paragraphs.push({component: LgHeadText});
                    break;
                case 'logoText':
                    this.paragraphs.push({component: TextLogo});
                    break;
                case 'highText':
                    this.paragraphs.push({component: TextImgHigh});
                    break;
                case 'contact':
                    this.paragraphs.push({component: Contact});
                    break;
                case 'question':
                    this.paragraphs.push({component: QuestionsAnswers});
                    break;
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
    margin: 0 10px;
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
    padding-left: 25px;
    padding-right: 25px;
    overflow: auto;
    height: calc(100vh - 250px);

}

div .up-read {
    height: 100px;
}

</style>
