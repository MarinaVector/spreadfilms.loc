<template>
    <div class="block">
        <button @click="open = !open" type="button" class="btn-blue button-arrow layouts btn-template">
            Template
        </button>
        <div v-if="open" class="dropdown-content">
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 1</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 2</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 3</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 4</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 5</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 6</a>
            <a class="dropdown-item p-2 hover:bg-blue-400" href="">Link 7</a>
        </div>
    </div>

</template>

<script>
    export default {
        data () {
            return {
                open: false,
            }
        }
    }

</script>

<style scoped>

    .btn-template {
        border: 6px solid white !important;
        border-radius: 3px;
    }

    .dropdown-content  {
        background-color: #fff;
        max-width: 270px;
        border-radius: 3px;
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.3s cubic-bezier(.25,.8,.25,1);
        text-align:  center;
        z-index: 1;
        right: 0;
        font-size: 16px;
        padding: 6px;
    }


</style>
