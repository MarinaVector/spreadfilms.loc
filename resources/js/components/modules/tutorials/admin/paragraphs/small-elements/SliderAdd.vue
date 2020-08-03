<template>
    <div>
        <ul id="example-1" class="el-btn">
            <li class="el-btn" v-for="item in items">
                <ul>
                    <li class="el-btn ml-4 mt-1"><i class="fas fa-bars blueiconcolor fa-2x"></i></li>
                    <li class="el-btn trigger-list pl-3 mb-1">{{ item.volume }}</li>
                </ul>
            </li>
        </ul>

        <a class="el-btn trigger-list btn-num ml-5 pl-4"  v-on:click="addItem">
            <i class="fas fa-bars blueiconcolor fa-2x pl-2 ml-4"></i><div class="ml-4">Slider +</div></a>
    </div>
</template>

<script>
let  i=2 ;
export default {
    data() {
        return {
        items: [
            { volume:'Slide 1'},
            {  volume:'Slide 2'}
        ]
    };
},
    methods: {
        addItem : function() {
           i++;
            this.items.push({ volume: "Slide " + i});
            console.log (+i);
           }
        }
    };

</script>

<style>

li .el-btn,
ul .el-btn,
button .el-btn {
    list-style-type: none;
}

button .el-btn {
    border-bottom: 1px solid #ddd;
    text-decoration: none;
    display: inline-block;
    border-color: #fff;
    font-weight: 400;
    text-align: center;
    white-space: nowrap;
    vertical-align: middle;
}

.trigger-list {
    border-bottom: 1px solid #ddd;
    display: block;
    position: relative;
    width: 90px;
}



</style>
