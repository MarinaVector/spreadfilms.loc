<template>
    <div class="row">
        <div class="col-lg-12">
            <ul id="sortable">
                <draggable v-model="tutorialsObj" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs">
                    <div v-for="tutorial in tutorialsObj" class=".paragraph" ref="paragraph">
                        <li class="ui-state-default draggable">
                            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>{{tutorial.name}}
                        </li>
                    </div>
                </draggable>
            </ul>
        </div>
    </div>
</template>

<script>
    import draggable from 'vuedraggable'

    export default {
        name: "TutorialsAdminList",
        created() {

        },
        components: {
            draggable,
        },
        props: [
            'tutorials',
        ],
        data() {
            return {
                tutorialsObj: [],
            }
        },
        mounted() {
            // converting tutorials JSON prop into data object
            this.tutorialsObj = JSON.parse(this.$props.tutorials);
            console.log(this.tutorialsObj);
        },
    }
</script>

<style scoped>

</style>
