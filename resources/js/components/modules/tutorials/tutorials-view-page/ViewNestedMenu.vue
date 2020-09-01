<template>
    <ul class="timeline tutorial-collapse">
        <li class="" v-for="(tutorial, index) in tutorialsObj" :key="tutorial.id">
            <div class="timeline-list pt-2">
                <div class="timeline-badge up mt-4 ml-3">
                    <i class="fas fa-minus fa-white fa-xs"></i>
                </div>

                <div class="timeline-panel">
                    <div class="timeline-body py-2 container">
                        <div class="row">
                            <div class="col-md-9 ml-3 mt-2">
                                <a :href="'/module/tutorials/view/' + tutorial.id" class="ml-1 mr-5 tutorial-lb">
                                    {{ tutorial.label }}
                                </a>
                            </div>
                            <div class="col-md-1 ml-n3 px-2">
                                <div v-if="tutorial.children" @click.prevent="toggleTutorial(index)"
                                     class="collapser-nested">
                                    <i
                                        class="fas arr-down fa-angle-up m-3 fa-sm"
                                        :class="[ `fa-angle-${tutorial.active ? 'down' : 'up'}`, `arr-${tutorial.active ? 'up' : 'down'}`]"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div v-show="tutorial.active" class="nested-down">
                    <view-nested-menu v-if="tutorial.children" :tutorials="tutorial.children"></view-nested-menu>
                </div>
            </div>
        </li>
    </ul>

</template>

<script>
import cloneDeep from 'lodash/cloneDeep'

export default {
    name: 'ViewNestedMenu',
    props: ['tutorials'],
    data() {
        return {
            tutorialsObj: [],
            returnArr: false
        }

    },
    created() {

    },
    mounted() {
        if (undefined !== this.tutorials) {
            this.tutorialsObj = cloneDeep(this.tutorials).map(item => {
                item.active = false
                return item
            });
        }
    },
    methods: {
        toggleTutorial(index) {
            this.tutorialsObj[index].active = !this.tutorialsObj[index].active;
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
    width: auto;
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

</style>
