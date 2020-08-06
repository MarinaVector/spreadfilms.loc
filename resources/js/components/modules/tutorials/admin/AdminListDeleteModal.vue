<template>
    <div id="modal-info" class="modal modal-message modal-info fade modal fade modal-open" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fas fa-minus-circle fa-3x mx-auto my-3"></i>
                </div>
                <div class="modal-title" id="exampleModalLongTitle">Are you sure you want to delete tutorial <b>{{tutorial.label}}</b> ?</div>
                <div class="modal-footer mx-auto">
                    <button type="button" class="btn button-modal button-chancel" data-dismiss="modal">Cancel</button>
                    <button @click="save(tutorial.id)" type="button" class="btn button-modal button-ok" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        components: {

        },
        props: {

        },
        data() {
            return {
                tutorial: {},
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
            };
        },
        methods: {
            save: function (tutorialID) {
                let data = {
                    tutorial_id: tutorialID
                };

                this.redirectToUrl('/module/tutorials/admin/delete/' + tutorialID, data, 'POST');
            },
            setTutorial: function (tutorial) {
                this.tutorial = tutorial;
            },
            redirectToUrl(url, data, method) {
                let form = document.createElement('form');
                document.body.appendChild(form);
                form.method = method;
                form.action = url;

                let input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_token';
                input.value = $('meta[name="csrf-token"]').attr('content');
                form.appendChild(input);

                for (let name in data) {
                    let input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = name;
                    input.value = data[name];
                    form.appendChild(input);
                }

                form.submit();
            },
        },
        created() {

        },
    };
</script>

<style>

</style>
