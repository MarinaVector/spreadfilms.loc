<template>
    <div class="row mb-5 teaser">
        <div class="col-md-4 offset-md-6 mt-5">
            <div class="teaser-head p-3 mb-2"><p>{{ settingsObj.startscreen_title }}</p></div>
            <button class="btn btn-secondary teaser-button tutorial-link">
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

</style>
