<template>
    <div class="teaser">
        <div class="mt-5">
            <div class="teaser-head p-3">
                <p v-html="settingsObj.startscreen_title"></p>
            </div>
            <br>
            <button class="teaser-button ml-3 px-3 py-1">
                {{ settingsObj.startscreen_button_text }}
            </button>
        </div>
    </div>
</template>

<script>
    import cloneDepp from 'lodash/cloneDeep'

    export default {
        components: {

        },
        name: 'DisplayTutorialsMainPage',
        props: ['settings'],
        data() {
            return {
                settingsObj: {},
                paragraphs: [],
            }

        },
        created() {
            if (undefined !== this.settings) {
                this.settingsObj = JSON.parse(this.settings);
                console.log(this.settingsObj);
                /*this.tutorialObj = this.tutorial.map(item => {
                    //item.active = false
                    return item
                });*/
            }
        },
        mounted() {

        },
        methods: {

        }
    }
</script>

<style>

.teaser {
    z-index: 5;
    position: relative;
    left: 40%;
    top: 16%;
}

</style>
