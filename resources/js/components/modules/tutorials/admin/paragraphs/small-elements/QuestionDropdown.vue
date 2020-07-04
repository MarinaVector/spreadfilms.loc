<template>
    <div class="dropdown">
        <button class="dropbtn si-dark-round">
            <i class="fas fa-question icon-img icon-question mr-1"></i>
        </button>
        <div class="dropdown-content mt-1 mr-3">
            <p :value="answerdropdown"> {{answerdropdown}}
           </p>
        </div>
    </div>
</template>

<script>
    export default {
    props: [
        'answerdropdown'
    ],
        created()
    {
        //console.log("NO NAME");
    }
    };

</script>

<style scoped>
    /* Style The Dropdown Button */
    .dropbtn {
        border: 1px solid #555;
        background: white;
        width: 25px;
        height: 25px;
        opacity: 0.5;
        font-size: 13px;
        line-height: 20px !important;
        color: white;
        text-shadow: none;
        border-radius: 30px;
        cursor: help !important;
    }

    .icon-question {
        color: #555 !important;
        opacity: 0.5;
    }

    /* The container <div> - needed to position the dropdown content */
    .dropdown {
        position: relative;
        display: inline-block;
    }

    /* Dropdown Content (Hidden by Default) */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #fff;
        min-width: 200px;
        border-radius: 3px;
        border: solid 1px #424242;
        text-align:  center;
        z-index: 1;
        right: 0;
        max-width: 50vw;
        font-size: 16px;
        padding: 6px;
    }

    /* Links inside the dropdown */
    .dropdown-content p {
        color: #424242;
        padding: 5px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content p:hover {
        background-color: #f1f1f1
    }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {
        display: block;
    }

    /* Change the background color of the dropdown button when the dropdown content is shown */
    .dropdown:hover .dropbtn,
    .icon-question {
        opacity: 1;
    }
</style>
