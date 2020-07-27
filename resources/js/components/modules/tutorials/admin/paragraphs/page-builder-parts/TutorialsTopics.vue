<template>
    <div>
        <treeselect
            :options="options"
            :load-options="loadOptions"
            placeholder="Select your tutorial(s)..."
            v-model="value"
        />
           <treeselect-value :value="value" />
    </div>
</template>

<script>
    import Treeselect from "@riophae/vue-treeselect";


    export default {
        components: { Treeselect },
        data: () => ({
            value: null,
            options: [ {
                id: '35',
                label: 'Tutorial1',
                children: [ {
                    id: '1',
                    label: 'ExCom test',
                }, {
                    id: '2',
                    label: 'ExCom Game',
                }, {
                    id: '3',
                    label: 'ExCom Cat',
                }, {
                    id: '4',
                    label: 'ExCom New',
                }, {
                    id: '5',
                    label: 'ExCom Chocolate',
                } ],
            }, {
                id: '36',
                label: 'Tutorial2',
                children: [ {
                    id: '6',
                    label: 'ExCom test2',
                }, {
                    id: '7',
                    label: 'ExCom Game2',
                }, {
                    id: '8',
                    label: 'ExCom Game3',
                }, {
                    id: '9',
                    label: 'ExCom Cola',
                } ],
            }, {
                id: '37',
                label: 'ExCom King',
                children: [ {
                    id: '10',
                    label: 'ExCom King1',
                }, {
                    id: '11',
                    label: 'ExCom King2',
                }, {
                    id: '12',
                    label: 'ExCom King3',
                }, {
                    id: '13',
                    label: 'ExCom King4',
                }, {
                    id: '15',
                    label: 'ExCom King5',
                } ],
            } ],
        }),
    }

</script>

<style>

   div .vue-treeselect__control {
        border-radius: 0;
    }
</style>
