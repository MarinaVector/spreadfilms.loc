<template>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <div class="panel-body p-4">
                    <div class="row">
                        <div class="col-md-12 mb-5">
                            <div class="input-group"><input type="text" placeholder="Search Here"
                                                            class="input-sm form-control"> <span
                                class="input-group-btn">
                              <button type="button" class="btn">Go!</button> </span></div>
                        </div>
                    </div>
                </div>
                <table class="table table-hover p-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>
                            <template v-for="(tutorial, index) in this.tutorialsObj">
                                <a href="#" class="p-vertical">
                                    {{ tutorial.name }}
                                </a>
                            </template>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="" v-for="(user, index) in this.usersObj">
                        <td>
                            <a href="#">{{ user.firstname }}</a>
                        </td>
                        <td class="" v-for="(tutorial, index) in user.tutorials">
                            <a href="#" :class="'social-icon si-dark-round si-facebook ' + tutorial.progressColorClass + ' mr-3'">
                                <i :class="'fas ' + tutorial.progressIconClass + ' icon-img'"></i>
                            </a>
                            <!--<a href="#" class="social-icon si-dark-round si-facebook si-minus">
                                <i class="fas fa-minus icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-minus">
                                <i class="fas fa-minus icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-plus">
                                <i class="fas fa-plus icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-dark">
                                <i class="fas fa-check icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-plus">
                                <i class="fas fa-plus icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-times">
                                <i class="fas fa-times icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-lock">
                                <i class="fas fa-lock icon-img"></i>
                            </a>
                            <a href="#" class="social-icon si-dark-round si-facebook si-lock">
                                <i class="fas fa-lock icon-img"></i>
                            </a>-->
                        </td>
                    </tr>
                    </tbody>
                </table>
            </section>
        </div>
        </div>

</template>

<script>
    export default {
        name: "TutorialsStatistics",
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
        data() {
            return {
                tutorialsObj: {},
                usersObj: {},
            };
        },
        methods: {

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
    }
</script>

<style scoped>

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

    .social-icon {
        box-shadow: 0 0 10px rgba(100, 100, 100, 0.2) inset, 1px 1px 1px #CCC;
        margin: 0 5px 5px 0;
        width: 40px;
        height: 40px;
        font-size: 20px;
        line-height: 40px !important;
        color: #555;
        text-shadow: none;
        border-radius: 3px;
        overflow: hidden;
        display: block;
        float: left;
        text-align: center;
    }

    .social-icon i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        line-height: 40px;
        position: relative;
    }

    .social-icon i:last-child {
        color: #FFF !important;
    }

    .social-icon:hover i:first-child {
        margin-top: -40px;
    }

    .icon-img {
        color: white !important;
    }

    .social-icon-lg i {
        display: block;
        -moz-transition: all 0.3s ease;
        -o-transition: all 0.3s ease;
        -webkit-transition: all 0.3s ease;
        transition: all 0.3s ease;
        line-height: 60px;
        position: relative;
    }

    .social-icon-lg i:last-child {
        color: #FFF !important;
    }

    .social-icon-lg:hover i:first-child {
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
        background-color: #ee2a7b;
    }

    .si-plus {
        background-color: #8dc63f;
    }

    .si-minus {
        background-color: #f7941e;
    }

    .si-lock {
        background-color: #662d91;
    }

    .si-dark {
        background-color: #1c75bc;
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
