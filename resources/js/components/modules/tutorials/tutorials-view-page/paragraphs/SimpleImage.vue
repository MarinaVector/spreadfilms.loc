<template>
    <div class="container">
        <img :src="ImagePath" alt="" class="f-width"/>
    </div>
</template>

<script>
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
        },
        data() {
            return {
                Image: this.mydata ? this.escapeHtml(this.$props.mydata.image) : '',
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
    .f-width {
        width: 100%;
    }
</style>
