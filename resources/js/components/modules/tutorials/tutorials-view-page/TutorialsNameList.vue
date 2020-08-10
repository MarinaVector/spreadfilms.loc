<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="tutorial in tutorialsObj">
                <div>
                    {{tutorial.label}}
                </div>
                <view-nested-menu :tutorials="tutorial.children" />
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
        // converting tutorials JSON prop into data object
        this.tutorialsObj = JSON.parse(this.$props.tutorials);
    },
    data() {
        return {
            tutorialsObj: {}
        }
    },
}
</script>
