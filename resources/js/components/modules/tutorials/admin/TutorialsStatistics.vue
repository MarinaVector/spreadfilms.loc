<template>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body p-4">
                    <div class="row">
                        <div class="col-md-12 my-4">
                            <div class="input-group"><input type="text" placeholder="Search Here"
                                                            class="input-sm form-control">
                                <span class="ml-2 mt-1 bg-yellow padding-5px-tb padding-15px-lr border-radius-5
                                margin-10px-bottom
                                 text-white font-size16 text-bold xs-font-size13 font-weight-bold">GO !</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container skrolling">
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>

                    <tr class="bg-light-gray">
                        <th class="text-uppercase name-col">
                            <div class="name-col">Name</div>
                        </th>
                        <th v-for="(tutorial, index) in this.tutorialsObj" align="left" id="rotate" data-toggle="tooltip"
                            data-placement="bottom"
                            title="" data-original-title="">
                            <!--<div id="points">...</div> -->
                            <div class="outer mb-5 ml-4">
                                <span id="inner"> {{ tutorial.name }}</span></div>
                        </th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="table-light table-hover" v-for="(user, index) in this.usersObj">
                        <td class="name-col text-wrap font-size-20">
                            <div class="name-col">
                                <a href="#">{{ user.firstname }}</a>
                            </div>
                        </td>
                        <td class="tut-col" v-for="(tutorial, index) in user.tutorials">
                            <div class="tut-col mx-auto">
                                <a href="#" :class="'stat-icon tb-icon si-dark-round si-facebook ' + tutorial.progressColorClass ">
                                    <i :class="'fas ' + tutorial.progressIconClass + ' icon-img'"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "TutorialsStatistics",
        components: {

        },
        props: {
            tutorials: {
                type: String,
                default: null
            },
            users: {
                type: String,
                default: null
            },
        },
        created() {
            if(undefined !== this.$props.tutorials){
                this.tutorialsObj = JSON.parse(this.$props.tutorials);
            }

            if(undefined !== this.$props.users){
                this.usersObj = JSON.parse(this.$props.users);
            }
            console.log(this.usersObj);
        },
        mounted(){

        },
        data() {
            return {
                tutorialsObj: {},
                usersObj: {},
            };
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

    .p-vertical {
        /* Safari, Chrome */
        -webkit-transform: rotate(-90deg);
        /* Firefox */
        -moz-transform: rotate(-90deg);
        /* IE */
        -ms-transform: rotate(-90deg);
        /* Opera */
        -o-transform: rotate(-90deg);
        /* Older versions of IE */
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
        /* CSS3 standard as defined here: http://www.w3.org/TR/css3-transforms/ */
        transform: rotate(-90deg);
        float: left;
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

    .txt-wrap {
        word-wrap: break-word;
        color:#424242;
        -moz-hyphens: auto;
        -webkit-hyphens: auto;
        -ms-hyphens: auto;
    }

   th .name-col {
        width: 250px;
   }

    td .name-col {
        width: 250px;
    }

    td.tut-col {
        width: 150px;
    }

    th .tut-col {
        width: 50px;
    }

    .skrolling {
        overflow-x: auto;
    }

    .tb-icon {
        margin-left: 7px;
    }

    .font-size-20 {
        font-size:18px;
    }

    th {
        height: auto;
    }

    .verticaltext-content {
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
        left: -20px;
        top: 35px;
    }

    .tutorial-col {
        height: auto;
    }

    .p-vertical {
        white-space:nowrap;
    }

   a .vertical {
        webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -ms-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        transform: rotate(-90deg);
        white-space:nowrap;
    }

   #rotate {
       text-align: left;
       height: 200px;
       white-space: nowrap;
       overflow: hidden;
       position: relative;
   }

    #points {
        position: absolute;
        margin-left: -6px;
        z-index: 12;
        transform: rotate(-90deg);
    }

    .outer {
        transform: translateY(50px) translateX(-10px) rotate(-90deg);
        width: 30px;
    }

    #inner {
        display: inline-block;
    }

</style>
