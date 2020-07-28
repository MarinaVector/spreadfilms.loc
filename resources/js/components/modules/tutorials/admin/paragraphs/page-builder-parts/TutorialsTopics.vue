<template>
    <div>
        <treeselect
            :options="options"
            :load-options="loadOptions"
            placeholder="Select your tutorial(s)..."
            v-model="value"
            :name="treename"
        />
    </div>
</template>

<script>
    import Treeselect from "@riophae/vue-treeselect";


    export default {
        name: "TutorialsTopics",
        components: { Treeselect },
        props: [
            'tutorials'
        ],
        mounted() {
            // converting userCompanyTutorials JSON prop into data object
            this.options = JSON.parse(this.$props.tutorials);
            console.log(this.options);
        },
        methods: {
            formTutorialChildren(element) {
                return [element.map(i => ({
                    id: `${i.id}`,
                    label: `${i.name}`,
                }))];
            }
        },
        data: () => ({
            value: 0,
                options: [{
                    id: '0',
                    label: 'No parent tutorial',
                }],
            loadOptions: function(){

            },
            treename: 'parent_tutorial_id',
        }),
    }

</script>

<style>

   div .vue-treeselect__control {
        border-radius: 0;
    }
</style>
