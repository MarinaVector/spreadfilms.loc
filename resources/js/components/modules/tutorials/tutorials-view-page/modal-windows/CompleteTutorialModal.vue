<template>
    <div class="modal fade" id="NormalTextModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="mx-auto logo-80px">
                    <img :src="logoSrc" class="tutorial-logo" alt="">
                </div>
                <div class="popup-content theme-background-horizontal">
                    <div class="popup-text-content">
                        <p>Super <strong>{{this.username}}</strong></p>
                        <br>
                        <div class="small">
                            <p>Congratulations! You've done a great job!</p>
                            <p>Continue with the next lesson!</p>
                        </div>
                    </div>
                    <div>
                        <button data-dismiss="modal" class="btn btn-def close-finished-popup popup-inner">Back</button>
                        <a class="btn btn-def close-finished-popup popup-inner" :href="this.nextTutorialLink">Next Tutorial</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'CompleteTutorialModal',
        props: [
            'logoSrc',
        ],
        components: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {
                nextTutorialLink: "/module/tutorials/view/",
                username: "",
            };
        },
        methods: {

        },
        computed: {

        },
    };
</script>

<style>

    button.btn-modal {
        margin-right: 40px;
        box-shadow: 0 0px 20px 3px rgba(0, 0, 0, 0.2);
    }

    .modal-footer1{
        pointer-events: auto;
    }

    .close-modal {
        background-color: #6c757d;
        border-color: #6c757d;
        color: white;
    }

</style>
