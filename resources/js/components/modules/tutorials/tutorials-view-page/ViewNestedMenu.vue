<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="tutorial in tutorials">
                <div> {{tutorial.label}}
                </div>
                <view-nested-menu v-if="tutorial.children" :tutorials="tutorial.children" />
            </li>
        </ul>
    </div>
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
