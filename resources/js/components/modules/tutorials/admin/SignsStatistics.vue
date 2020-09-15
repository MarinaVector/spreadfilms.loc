<template>
    <div class="row">
        <div class="col-xl-12 col-md-6 mt-3">
            <div class="panel">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <a href="#" class="stat-icon si-dark-round si-facebook si-dark mr-3">
                                    <i class="fas fa-times icon-img"></i>
                                </a>
                                <p class="font-size-20 mt-3 ml-4">Done</p>
                            </div>
                            <div class="col-4">
                                <a href="#" class="stat-icon si-dark-round si-facebook si-minus mr-3">
                                    <i class="fas fa-minus icon-img"></i>
                                </a>
                                <p class="font-size-20 mt-2 pl-4">In progress</p>
                            </div>
                            <div class="col-4">
                                <a href="#" class="stat-icon si-dark-round si-facebook si-plus mr-3">
                                    <i class="fas fa-plus icon-img"></i>
                                </a>
                                <p class="font-size-20 mt-3 pl-4">Invited</p>
                            </div>
                            <div class="col-4">
                                <a href="#" class="stat-icon si-dark-round si-facebook si-times mr-3">
                                    <i class="fas fa-times icon-img"></i>
                                </a>
                                <p class="font-size-20 mt-3 pl-4">Not assigned</p>
                            </div>
                            <div class="col-4">
                                <a href="#" class="stat-icon si-dark-round si-facebook si-lock mr-3">
                                    <i class="fas fa-lock icon-img"></i>
                                </a>
                                <p class="font-size-20 mt-3 pl-4">Not assigned</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "SignsStatistics",
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
    }
</script>

<style>

    th {
        border: none !important;
    }

    .stat-icon {
        box-shadow: 0 0 10px rgba(100, 100, 100, 0.2) inset, 1px 1px 1px #CCC;
        /* margin: 0 5px 5px 0; */
        width: 40px;
        height: 40px;
        font-size: 20px;
        /* line-height: 40px !important; */
        /* color: #555; */
        text-shadow: none;
        border-radius: 3px;
        overflow: hidden;
        display: block;
        float: left;
        text-align: center;
        border: none;
    }

    .stat-icon i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        line-height: 40px;
        position: relative;
    }

    .stat-icon i:last-child {
        color: #FFF !important;
    }

    .stat-icon:hover i:first-child {
        margin-top: -40px;
    }

    .icon-img {
        color: white !important;
    }

    .stat-icon-lg i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        line-height: 60px;
        position: relative;
    }

    .stat-icon-lg i:last-child {
        color: #FFF !important;
    }

    .stat-icon-lg:hover i:first-child {
        margin-top: -60px;
    }

    .si-dark-round {
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        -ms-border-radius: 50%;
        border-radius: 50%;
    }

    .profile-card h5 a {
        font-size: 15px;
    }

    .profile-card a {
        font-size: 12px;
    }

    .si-times {
        background-color: #ff48a4;
    }

    .si-plus {
        background-color: #8dc63f;
    }

    .si-minus {
        background-color: #ff5722;
    }

    .si-lock {
        background-color: #662d91;
    }

    .si-dark {
        background-color: #02c2c7;
    }

    ul.online-users li {
        list-style: none;
        position: relative;
        margin: 3px auto !important;
        padding-left: 2px;
        padding-right: 2px;
    }

    .list-inline > li {
        display: inline-block;
        padding-right: 5px;
        padding-left: 5px;
    }

    .p-table th,
    .p-table td {
        vertical-align: middle !important;
    }

    .p-team img {
        width: 35px;
        height: 35px;
        border-radius: 4px;
    }

    .p-name a {
        font-size: 14px;
    }

    .p-details .bio-row p span {
        width: auto;
    }

    .p-team a {
        display: inline-block;
    }

    .p-files li a {
        margin-bottom: 10px;
        color: #949494;
        display: block;
    }

    .p-files li i {
        padding-right: 10px;
        width: 20px;
    }

    .p-tag-list li {
        display: inline-block;
        margin: 0 5px 7px 0;
    }

    .p-tag-list li a {
        display: inline-block;
        border: 1px solid #ddd;
        padding: 3px 10px;
        color: #797979;
        border-radius: 4px;
        font-size: 12px;
    }

  </style>
