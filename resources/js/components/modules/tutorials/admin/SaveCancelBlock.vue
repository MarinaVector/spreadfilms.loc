<template>
    <div class="container mt-3 pt-1 button-selection">
        <div class="row">
            <div class="col-lg-12>

        <div class="box-white id="option-buttons-form">
            </div>
            <div class="col-lg-12 inner-menu pt-3 save-chancel">
                <div class="form-group">
                    <input class="btn btn-primary btn-save" type="submit" value="Save">
                    <a href="/module/tutorials/admin" class="btn btn-default btn-save ml-1">Cancel</a>
                    <div class="pull-right">
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SaveCancelBlock",
        components: {

        },
        props: {

        },
        created() {

        },
        mounted() {

        },
        data() {
            return {};
        },
        methods: {

        },
        computed: {

        },
    };
</script>

<style>

    .button-selection {
        position: fixed;
        bottom: 0;
        margin: 0 auto;
        z-index: 55;
    }

    #option-buttons-form > div {
        background: #ECECEC;
        border: solid 1px #aaa;
        padding: 20px 20px 10px 20px;
        border-bottom: none;
        bottom: 0;
        margin: 0 auto;
    }

    .btn:not(.btn-sm) {
        font-size: 14px;
        text-transform: uppercase;
        height: 42px;
        line-height: 42px;
        padding: 0 15px;
    }

    .btn-primary {
        background: #44abe2;
        background: linear-gradient(to right, #008acb 0%, #00bff9 100%);
        border-width: 0;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
    }

    .btn {
        display: inline-block;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid transparent;
        padding: .375rem .75rem;
        font-size: 1rem;
        line-height: 1.5;
        border-radius: .25rem;
        transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out,
        box-shadow .15s ease-in-out;
    }

    .btn-default {
        background: #fff;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        color: #777777;
    }
    .save-chancel {
        z-index: 20;
    }

    .btn-save {
        width: 105px;
    }

    @media only screen and (max-width: 320px) {

        .btn-save {
            width: 80px;
        }

    }

</style>
