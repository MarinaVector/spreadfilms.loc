<template>
    <div class="tutorial-wrapper">
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
            if(this.tutorialObj.paragraphs){
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
                        if(null !== paragraphData){
                            Component.mydata = paragraphData;
                        }
                        this.paragraphs.push({component: Component});
                        break;
                    case 'video':
                        this.paragraphs.push({component: Video});
                        break;
                    case 'TxtImg':
                        Component = cloneDepp(TextImg);
                        if(null !== paragraphData){
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

.collapser-nested {
    display: inline;
    cursor: pointer;
}

.timeline-badge {
    width: 10px;
    height: 10px;
    line-height: 8px;
    font-size: 1em;
    position: absolute;
    background-color: #666666;
    border-radius: 50%;
}

.timeline-panel:hover {
    background-color: #fcf9f9;
    border-left: 7px solid #F0F0F0;
    white-space: normal;
    }

.strike {
    display: none;
}

.tutorial-player {
    padding-top: 14px;
    padding-bottom: 20px;
    padding-right: 40px;
    padding-left: 20px;
    text-transform: uppercase;
    border-radius: 4px 4px 0 0;
    position: relative;
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    background: linear-gradient(40deg, #2096ff, #05ffa3) !important;
    color: #fff;
    border: none;
    width: 210px;
}

button .tutorial-player:active,
button .tutorial-player:focus {
    outline: none !important;
}

button .tutorial-player::-moz-focus-inner {
    border: 0 !important;
}

.collapser {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    right: 15px;
    cursor: pointer;
}

.tutorial-collapse {
    background: #F0F0F0;
    text-align: center;
    border: 0;
    color: #424242;
    vertical-align: middle;
    outline: none;
    font-size: 0.75rem;
    border-radius: 0 0 3px 3px;
}

.tutorial-link {
    padding: 10px;
    width: 100%;
    display: block;
}

.progress-wrapper.children {
    background: #333;
    bottom: 0;
}

.progress-wrapper {
    position: absolute;
    width: 100%;
    left: 0;
    height: 3px;
}

.progress-wrapper.self.double {
    bottom: 5px;
}

.progress-wrapper.self.double {
    display: none;
}

.progress-wrapper.self {
    background: #333;
    bottom: 0;
    overflow: hidden;
}

.progress-wrapper {
    position: absolute;
    width: 100%;
    left: 0;
    height: 3px;
}

.progress {
    margin: 5px 0 0 0;
    background: #e8e8e8;
    overflow: visible;
    border-color: #989898;
    border-style: solid;
    border-width: 1px 1px 1px 1px;
    height: 2em;
}

.number {
    font-weight: normal;
    padding: 1px 8px;
    border-radius: 10px;
    border: solid 1px;
    line-height: 1em;
    display: inline-block;
    vertical-align: middle;
    font-size: 0.75em;
}

.timeline {
    list-style: none;
    position: relative;
}

.timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 1px;
    background-color: #CCCCCC;
    left: 21px;
}

.timeline > li {
    position: relative;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li > .timeline-panel {
    width: 190px;
}

.timeline > li > .timeline-panel:before {
    position: absolute;
    top: 26px;
    left: -15px;
    display: inline-block;
}

.timeline > li > .timeline-panel:after {
    position: absolute;
    top: 27px;
    left: -14px;
    display: inline-block;
}

.timeline > li > .timeline-badge {

    width: 11px;
    height: 11px;
    line-height: 8px;
    font-size: 1em;
    position: absolute;
    background-color: #666666;
    border-radius: 50%;
}

.timeline > li.timeline-inverted > .timeline-panel {
    float: left;
}

.timeline > li.timeline-inverted > .timeline-panel:before {
    border-left-width: 0;
    border-right-width: 15px;
    right: -15px;
    right: auto;
}

.timeline > li.timeline-inverted > .timeline-panel:after {
    border-left-width: 0;
    border-right-width: 14px;
    left: -14px;
    right: auto;
}

.timeline-badge.primary {
    background-color: black !important;
}

.timeline-badge.up {
    background-color: #525252 !important;
}

.timeline-badge.down {
    background-color: #d32f2f !important;
}

.timeline-badge.neutral {
    background-color: #999999 !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

.timeline-body > p + p {
    margin-top: 5px;
}

.timeline-body:hover {
    background-color: #aaa;
}

.fa-white {
    color: #ffffff !important;
}

li {
    list-style-type: none;
}

ul {
    margin-left: 0;
    padding-left: 0;
}

div .timeline-body:active {
    color: #D60E2A;
}

div .timeline-body:hover {
    background-color: #aaa !important;
    color: #424242 !important;
}

.tutorial-lb:hover {
    color: #424242 !important;
}

.nested-down:before {
    content: "";
    display: block;
    box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.5);
}

.nested-down:after {
    content: "";
    display: block;
    box-shadow: 0px 0px 8px 1px rgba(0, 0, 0, 0.5);
}

.tutorial-wrapper{
    padding: 60px 15%;
    height: auto;
}

</style>
