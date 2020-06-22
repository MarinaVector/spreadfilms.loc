<template>
    <div>
        <input id="input_id" name="name" :value="myvariable">
        <br>
        {{myvariable}}
        <br>
        {{marina}}
    </div>
</template>

<script>
    export default {
        props: [
            'myvariable',
            'marina'
        ],
        created() {
            console.log(this.myvariable);
        },
    };
</script>
