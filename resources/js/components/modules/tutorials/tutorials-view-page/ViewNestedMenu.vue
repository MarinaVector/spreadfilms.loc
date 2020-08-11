<template>

        <ul class="">
            <li class="" v-for="tutorial in tutorials">

<div class="timeline-list pt-2">

            <div class="timeline-badge up ml-3 mt-2">
                <i class="fas fa-minus fa-white fa-xs"></i></div>

            <div class="timeline-panel">
                <div class="timeline-body py-2">
                    {{tutorial.label}}
                   <!-- <span class="number"></span> -->
                </div>

            </div>
            <view-nested-menu v-if="tutorial.children" :tutorials="tutorial.children" />
</div>
            </li>

        </ul>





</template>

<script>
    export default {
        name: 'TutorialsNameList',
        props: ['tutorials'],
        mounted () {

        },
        created() {

        },
        data() {
            return {
                tutorialsObj: {}
            }
        },
    }
</script>

<style>

.timeline-badge {
    width: 12px;
    height: 12px;
    line-height: 8px;
    font-size: 1em;
    position: absolute;
    background-color: #666666;
    border-radius: 50%;
}

 .timeline-panel:hover {
background-color: #aaa;
 }

</style>
