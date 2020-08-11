<template>
    <div>
        <div class="input-form mb-4 pt-5">
            <input placeholder="Search for..." type="text" class="form-control search-input pl-holder">
            <span class="search-icon px-2"><i class="fas fa-search mt-2"></i></span>
        </div>
        <div>

            <div class="last menu-before mb-3">
                <div class=" last-inner theme-background-horizontal">
                    <span class="tutorial-phrase">Continue <strong>"What makes us successful"</strong>go</span>
                </div>
            </div>





        </div>
        <div>




        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {


        }
    },
    methods: {
        arrowEl() {

        }
    }
}
</script>

<style>

.input-form {
    display: flex;
    width: 210px;
}

 .tutorial-phrase {
    padding: 10px;
    width: 210px;
    display: block;
}

.tutorial-phrase {
    border-radius: 3px;
    background: #fff;
    color: #d32f2f;
    border: solid #d32f2f 1px;
}


.pl-holder {
    border: solid 1px #aaa;
}

.search-icon {
    text-align: center;
    background: #ccc;
    border: solid 1px #aaa;
    right: 20px;
    border-radius: 0 4px 4px 0;
    border-left: none;
}


.search-icon i {
    color: #fff;
    font-size: 1.3em;
}


.search-input {
    border: solid 1px #aaa;
    border-radius: 4px 0 0 4px;
    padding: 7px 50px 7px 20px;
    display: block;
    width: 100%;
}


</style>
