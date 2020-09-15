<template>
    <div class="mt-5 teaser offset-md-6">
       <div class="teaser-info">
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
        name: 'DisplayTutorialsMainPage',
        components: {

        },
        props: [
            'settings'
        ],
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
        data() {
            return {
                settingsObj: {},
                paragraphs: [],
            }

        },
        methods: {

        },
        computed: {

        },
    }
</script>

<style>

.teaser {
    left: 40%;
    top: 16%;
}

.teaser-info {
    position: sticky;
    z-index: 5;
}

</style>
