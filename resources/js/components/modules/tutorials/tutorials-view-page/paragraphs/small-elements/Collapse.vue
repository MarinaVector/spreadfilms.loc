<template>
    <div class="toggle-collapse"></div>
</template>

<script>
    export default {
        name: "Collapse"
    }
</script>

<style scoped>
    .toggle-collapse {
        width: 50px;
        height: 50px;
        position: absolute;
        right: 20px;
        text-align: center;
        background: #bbb;
        cursor: pointer;
        border-radius: 0 0 3px 3px;
        bottom: 0;
        transform: translateY(100%);
    }
</style>
