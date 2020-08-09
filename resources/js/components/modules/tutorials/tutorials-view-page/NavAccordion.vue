<template>
    <div>
        <div class="input-form mb-4 pt-5">
            <input placeholder="Search for..." type="text" class="form-control search-input pl-holder">
            <span class="search-icon px-2"><i class="fas fa-search mt-2"></i></span>
        </div>
        <div>

            <div class="last menu-before mb-3">
                <div class=" last-inner theme-background-horizontal">
                    <span class="tutorial-phrase">Continue <strong>"What makes us successful"</strong>go</span>
                </div>
            </div>



            <b-button class="tutorial-player pb-5"
                      :class="visible1 ? null : 'collapsed'"
                      :aria-expanded="visible1 ? 'true' : 'false'"
                      aria-controls="collapse-1"
                      @click="visible1 = !visible1"
            >
                <div class="inner">


                    <span class="tutorial-link menu-link">
                        <span class="inner-name-span">verovis DNA</span>
                        <span class="number">2</span>
                        <!-- <button type="button" class="btn btn-outline-secondary">Secondary</button> -->
                        <span @click="arrowEl" data-toggle="collapse" data-target="#sub-list-15"
                              class="collapser collapsed" aria-expanded="false">

                            <i  v-if="arrVisible" class="fas fa-angle-down arr-down"></i>
                            <i  v-else class="fas fa-angle-up arr-up"></i>

                </span>
                        <span class="progress-wrapper self double"><span class="progress"
                                                                         style="width: 100%;">

                        </span>
                        </span>
                        <span class="progress-wrapper children"><span class="progress"
                                                                      style="width: 40%;">

                        </span>
                        </span>
                    </span>

                </div>
            </b-button>

            <b-collapse id="collapse-1" v-model="visible1" class="">
                <div class="">
                   <!-- <tutorial-list :data='@json($userCompanyTutorials)'></tutorial-list> -->

                   <!-- <ul class="timeline tutorial-collapse mb-0">
                        <li class="timeline-list py-3">
                            <div class="timeline-badge up ml-3 mt-1">
                                <i class="fas fa-minus fa-white fa-xs"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-body">
                                    <p>Tutorial</p>
                                </div>

                            </div>
                        </li>
                        <li class="timeline-list py-3">
                            <div class="timeline-badge down ml-3 mt-1">
                                <i class="fas fa-check fa-white fa-xs"></i></div>
                            <div class="timeline-panel">

                                <div class="timeline-body">
                                    <p>Tutorial 7</p>

                                </div>
                            </div>
                        </li>

                        <li class="timeline-list py-3">
                            <div class="timeline-badge up ml-3 mt-1">
                                <i class="fas fa-minus fa-white fa-xs"></i></div>
                            <div class="timeline-panel">

                                <div class="timeline-body">
                                    <p>Tutorial</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    -->
                </div>
            </b-collapse>
        </div>
        <div>


            <b-button class="tutorial-player pb-5"
                      :class="visible2 ? null : 'collapsed'"
                      :aria-expanded="visible2 ? 'true' : 'false'"
                      aria-controls="collapse-2"
                      @click="visible2 = !visible2"
            >
                Verovis DNA

                <span class="number">2</span>
                <!-- <button type="button" class="btn btn-outline-secondary">Secondary</button> -->
                <span @click="arrowEl" data-toggle="collapse" data-target="#sub-list-15"
                      class="collapser collapsed" aria-expanded="false">

                            <i  v-if="arrVisible" class="fas fa-angle-up arr-down"></i>
                            <i  v-else class="fas fa-angle-down arr-up"></i>

                </span>

            </b-button>
            <b-collapse id="collapse-2" v-model="visible2">
                <div class="">
                    <ul class="timeline tutorial-collapse">
                        <li class="timeline-list pt-2">
                            <div class="timeline-badge up ml-3 mt-1">
                                <i class="fas fa-minus fa-white fa-xs"></i></div>
                            <div class="timeline-panel">
                                <div class="timeline-body">
                                    <p>Tutorial</p>
                                </div>

                            </div>
                        </li>
                        <li class="timeline-list py-3">
                            <div class="timeline-badge down ml-3 mt-1">
                                <i class="fas fa-check fa-white fa-xs"></i></div>
                            <div class="timeline-panel">

                                <div class="timeline-body">
                                    <p>Tutorial</p>

                                </div>
                            </div>
                        </li>

                        <li class="timeline-list py-3">
                            <div class="timeline-badge up ml-3 mt-1">
                                <i class="fas fa-minus fa-white fa-xs"></i></div>
                            <div class="timeline-panel">

                                <div class="timeline-body">
                                    <p>Tutorial</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </b-collapse>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {

            visible1: true,
            visible2: false,
            arrVisible: false
        }
    },
    methods: {
        arrowEl() {
           this.arrVisible  = !this.arrVisible
        }
    }
}
</script>

<style>

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
    background: linear-gradient(-45deg, #bee789, #1aa69d 50%);
    color: #fff;
    border: none;
    width: 210px;
}

.input-form {
    display: flex;
    width: 210px;
}

.tutorial-link {
    cursor: pointer;
}
 .tutorial-phrase {
    padding: 10px;
    width: 210px;
    display: block;
}

.tutorial-phrase {
    border-radius: 3px;
    background: #fff;
    color: #D60E2A;
    border: solid #D60E2A 1px;
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

.pl-holder {
    border: solid 1px #aaa;
}

.search-icon {
    text-align: center;
    background: #ccc;
    border: solid 1px #aaa;
    right: 20px;
    border-radius: 0 4px 4px 0;
    border-left: none;
}


.search-icon i {
    color: #fff;
    font-size: 1.3em;
}


.search-input {
    border: solid 1px #aaa;
    border-radius: 4px 0 0 4px;
    padding: 7px 50px 7px 20px;
    display: block;
    width: 100%;
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
    padding: 20px 0 20px;
    position: relative;
}

.timeline:before {
    top: 0;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 1px;
    background-color: #CCCCCC;
    left: 22px;
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

    width: 12px;
    height: 12px;
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
    background-color: #CC3333 !important;
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

.timeline-list:hover {
    background-color: #aaa;
}

.fa-white {
    color: #ffffff !important;
}
</style>
