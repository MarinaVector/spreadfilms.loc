<template>
    <div class="mt-5 teaser offset-md-6">
       <div class="teaser-info">
           <div class="teaser-head p-3">
                <p v-html="settingsObj.startscreen_title"></p>
            </div>
            <br>
            <button  v-bind:class=" {btnnocontent:btnNoContent, btnyescontent:btnYesContent} " class="teaser-button ml-3 px-3 py-1">
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

            if (this.startscreen_button_text === '') {
                this.btnNoContent = true;
                this.btnYesContent = false;
                }
            else {
                this.btnYesContent = true;
                this.btnNoContent = false;
            }

        },
        mounted() {

        },
        data() {
            return {
                settingsObj: {},
                paragraphs: [],
                btnNoContent: true,
                btnYesContent: false
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

.btnnocontent {
    visibility: hidden;
    }

.btnyescontent {
    visibility: visible;
}



</style>
