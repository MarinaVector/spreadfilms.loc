<template>
    <div class="container">
        <img :src="ImagePath" alt="" :class="PositionClass"/>
    </div>
</template>

<script>
    import cloneDepp from "lodash/cloneDeep";
    import Headline from "../../admin/paragraphs/Headline";

    export default {
        name: "SimpleImage",
        components: {

        },
        props: {
            index: {
                type: Number,
                default: null
            },
            mydata: {
                type: Object,
                default: () => {}
            },
        },
        created() {

        },
        mounted() {
            this.ImagePath = this.getImagePath(this.Image);
            switch (this.Position) {
                case 'fs':
                    this.PositionClass = 'f-screen';
                    break;
                case 'fw':
                    this.PositionClass = 'f-width';
                    break;
                case 'fh':
                    this.PositionClass = 'f-height';
                    break;
                default:
                    return;
            }
        },
        data() {
            return {
                Image: this.mydata ? this.escapeHtml(this.$props.mydata.image) : '',
                PositionClass: '',
                Position: this.mydata.position ? this.escapeHtml(this.mydata.position) : 'fs',
                ImagePath: null,
            };
        },
        methods: {
            escapeHtml: function (value) {
                return $('<div/>').html(value).text();
            },
            getImagePath: function(path) {
                let disk = path.split('/')[0];
                let realPath = '';
                switch (disk) {
                    case 'company-public':
                        realPath = this.$parent.publicpath + path.split('/')[1];
                        break;
                    case 'company-private':
                        realPath = this.$parent.privatepath + path.split('/')[1];
                        break;
                    default:
                        return;
                }

                return realPath;
            },
        },
        computed: {

        },
    };
</script>

<style scoped>

    .tutorial-complex {
        background-color: #f9f9f9;
    }

    .tutorial-complex:hover .btn-icon {
        opacity: 1 !important;
    }

    .f-screen {
        width: 100%;
        height: 100%;
    }

    .f-width {
        width: 100%;
    }

    .f-height {
        height: 100%;
    }
</style>
