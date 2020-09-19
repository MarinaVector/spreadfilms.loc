<template>
    <div>
        <div id="example-1" class="el-btn">

            <div class="slide-border trigger-list" v-for="item in items">
               <draggable v-model="tutorialsObj" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs">
                <ul class="pl-1 mb-1">
                    <li class="el-btn pt-1"><i class="fas fa-bars blueiconcolor fa-2x"></i></li>
                    <li class="el-btn">{{ item.volume }}</li>
                </ul>
                </draggable>

            </div>

            <draggable v-model="tutorialsObj" @start="drag=true" @end="drag=false" handle=".draggable" ref="paragraphs">
            <a class="trigger-list btn-num py-1"  v-on:click="addItem">
                <i class="fas fa-bars blueiconcolor fa-2x"></i><div class="ml-3">Slider +</div></a>
            </draggable>
        </div>

        </div>

</template>

<script>
    import draggable from 'vuedraggable'

    let  i=1 ;
    export default {
        name: "SliderBtn",
        components: {
            draggable
        },
        props: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                items: [
                    { volume:'Slider 1'}
                ]
            };
        },
        methods: {
            addItem : function() {
               i++;
                this.items.push({ volume: "Slider " + i});
                console.log (+i);
               }
            },
        computed: {

        },
    };
</script>

<style>

li .el-btn,
ul .el-btn,
button .el-btn {
    list-style-type: none;
    margin-bottom: 0;
}

button .el-btn {

    text-decoration: none;
    display: inline-block;
    border-color: #fff;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
}

.il {
    border-bottom: 1px solid #ddd;
}

.trigger-list {

    display: block;
    position: relative;

}



</style>
