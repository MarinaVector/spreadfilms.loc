<template>
    <vc-donut
        background="#ffffff"
        foreground="#dddddd"
        :size="65"
        unit="%"
        :thickness="10"
        hasLegend
        :sections="sections" :total="100"
        :value="25"
        :start-angle="0"
        :auto-adjust-text-size="true"
        @section-click="handleSectionClick">

        <div class="inner-progress">
            <span class="teaser">You already have</span> <h1 style="margin: 0;">{{this.usertutorialsprogress}}%</h1>
            <span class="tutorial">
                Tutorials done!
            </span>
        </div>
    </vc-donut>
</template>

<script>
    export default {
        name: 'ChartCircle',
        components: {

        },
        props: [
            'usertutorialsprogress',
        ],
        created() {
            this.sections[0].value = this.usertutorialsprogress;
        },
        mounted() {

        },
        data() {
            return {
                sections: [
                    {  value: 0, color: "#d32f2f" },
                ]
            };
        },
        methods: {
            handleSectionClick(section, event) {
                console.log(`${section.label} clicked.`);
            }
        },
        computed: {

        },
    };
</script>

<style>

    div .percent {
        font-size: 4em;
        font-weight: normal;
    }

    div .inner-progress {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate3d(-50%, -50%, 0);
        width: 100%;
        text-align: center;
        padding: 0 20px;
        color: #424242;
        font-size: 10px;
    }

    .cdc-legend-item {
        visibility: hidden;
    }

</style>
