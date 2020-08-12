<template>
    <ul class="">
        <li class="" v-for="tutorial in tutorials">
            <div class="timeline-list pt-2">
                <div class="timeline-badge up ml-3 mt-2">
                    <i class="fas fa-minus fa-white fa-xs"></i>
                </div>

                <div class="timeline-panel">
                    <div class="timeline-body py-2">
                        {{ tutorial.label }}
                        <!-- <span class="number"></span> -->
                        <span @click.prevent="toggleTutorial(index)"
                              class="collapser-nested mr-1">
                            <i
                                class="fas fa-angle-up arr-down"
                                :class="[`fa-angle-${tutorial.active ? 'down' : 'up'}`, `arr-${tutorial.active ? 'up' : 'down'}`]"
                            />
                        </span>
                    </div>
                </div>
                <view-nested-menu v-if="tutorial.children" :tutorials="tutorial.children"></view-nested-menu>
            </div>
        </li>
    </ul>
</template>

<script>
export default {
    name: 'TutorialsNameList',
    props: ['tutorials'],
    mounted() {

    },
    created() {
        console.log(this.$props.tutorials);
    },
    data() {
        return {
            tutorialsObj: {}
        }
    },
    methods: {
        toggleTutorial(index) {
            this.tutorialsObj[index].active = !this.tutorialsObj[index].active
        },
    }
}
</script>

<style>

.collapser-nested {
    position: absolute;
    top: 40%;
    transform: translateY(-50%);
    right: 15px;
    cursor: pointer;
}

.timeline-badge {
    width: 12px;
    height: 12px;
    line-height: 8px;
    font-size: 1em;
    position: absolute;
    background-color: #666666;
    border-radius: 50%;
}

.timeline-panel:hover {
    background-color: #dddddd;
}

</style>
