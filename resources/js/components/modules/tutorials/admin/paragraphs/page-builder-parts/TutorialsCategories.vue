<template>

    <div class="mx-3 mx-lg-0">
        <treeselect :options="options" :value="value" :multiple="multiple" :name="treename" :joinValues="true">
            <div slot="value-label" slot-scope="{ node }">{{ node.raw.customLabel }}</div>
        </treeselect>
    </div>

</template>

<script>
    // import the component
    import Treeselect from '@riophae/vue-treeselect'
    // import the styles
    import '@riophae/vue-treeselect/dist/vue-treeselect.css'

    export default {
        components: { Treeselect },
        props: [
            'usercompanycategories',
            'categories'
        ],
        data: () => ({
            multiple: true,
            value: [],
            options: [],
            treename: 'categories',
        }),
        created() {

        },
        mounted() {
            // converting usercompanycategories JSON prop into data object
            let usercompanycategoriesObj = JSON.parse(this.$props.usercompanycategories);
            let usercompanycategoriesArr = [];
            usercompanycategoriesObj.forEach(usercompanycategoriesObjElement => {
                usercompanycategoriesArr.push(
                    {
                        id: usercompanycategoriesObjElement.id,
                        name: usercompanycategoriesObjElement.name,
                    });
            });

            this.options = usercompanycategoriesArr.map(i => ({
                id: `${i.id}`,
                label: `${i.name}`,
                customLabel: `${i.name}`,
            }));

            //setting tutorial selected categories
            if('' !== this.$props.categories){
                this.value = this.$props.categories.split(",");
            }
        },
    }

</script>
































