<template>
    <div>
        <ul class="list-group">
            <li class="list-group-item" v-for="tutorial in tutorialsObj">
                {{tutorial.label}}
            </li>
        </ul>
    </div>
</template>

<script>
//let data11 = @json($companyTutorials);
export default {
    name: 'TutorialsNameList',
    props: ['tutorials'],
    mounted () {

    },
    created() {
        // converting tutorials JSON prop into data object
        this.tutorialsObj = JSON.parse(this.$props.tutorials);
        console.log(this.tutorialsObj)
    },
    data() {
        return {
            tutorialsObj: {},
        }
    },
}
</script>
