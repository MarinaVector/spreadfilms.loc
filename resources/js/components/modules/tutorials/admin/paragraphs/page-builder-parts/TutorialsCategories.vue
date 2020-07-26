<template>

    <div>
        <treeselect :options="options" :value="value" :multiple="multiple">
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
        data: () => ({
            multiple: true,
            value: null,
            options: [ 'ExCom', 'Marina', 'Denis' ].map(i => ({
                id: i,
                label: `Label ${i}`,
                customLabel: `Tutorial ${i}`,
            })),
        }),
    }

</script>
































