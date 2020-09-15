<template>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-lg-2 col-xl-2 offset-2 col-10 mx-lg-5 mt-5">
                <div class="center container mt-3">
                    <div class="row">
                        <div class="col-12">
                                <span class="profile-picture">
                                    <img class="editable img-responsive" alt="Avatar" id="avatar2" src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces">
                                </span>
                        </div>
                        <div class="col-12">
                            <a href="#" class="btn btn-sm ace-button mt-3">
                                <i class="ace-icon fa fa-plus-circle bigger-120"></i>
                                <span class="bigger-110">Add or edit</span>
                            </a>
                        </div>
                        <div class="col-12">
                                <span class="label label-purple arrowed-in-right mt-2 ml-1">
                                    online
                                </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-10 mt-5">
                <h4 class="gray my-3">
                    <span class="middle ml-3 mb-2">Jon Dye</span>


                </h4>

                <div class="profile-user-info">
                    <div class="profile-info-row">
                        <div class="profile-info-name text-left">Sex</div>

                        <div class="profile-info-value ml-xl-2">
                            <span>men</span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name text-left"> Location </div>

                        <div class="profile-info-value">
                            <i class="fa fa-map-marker bigger-110"></i>
                            <span>Netherlands</span>
                            <span>Amsterdam</span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name text-left">Year of birth</div>

                        <div class="profile-info-value">
                            <span>2000</span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name text-left">E-mail</div>

                        <div class="profile-info-value">
                            <span>example@gmail.com</span>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name text-left">Zip code</div>

                        <div class="profile-info-value">
                            <span>337000</span>
                        </div>
                    </div>


                    <div class="hr hr-8 dotted"></div>


                    <div class="profile-info-row">
                        <div class="profile-info-name text-left">Phone</div>

                        <div class="profile-info-value">
                            <a href="#" target="_blank">+10000000000</a>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">
                            <i class="middle ace-icon fa fa-facebook-square bigger-150 blue"></i>
                        </div>

                        <div class="profile-info-value">
                            <a href="#">Facebook</a>
                        </div>
                    </div>

                    <div class="profile-info-row">
                        <div class="profile-info-name">
                            <i class="middle ace-icon fa fa-twitter-square bigger-150 light-blue"></i>
                        </div>

                        <div class="profile-info-value">
                            <a href="#">Twitter</a>
                        </div>
                    </div>
                </div>
            </div>

            <hr>

            <div class="col-lg-4 col-xl-4 col-10 mt-5">
                <div class="">
                    <h4 class="gray my-3">
                        <span class="middle ml-3 mb-2 my-3">Company</span>
                    </h4>


                    <div class="profile-user-info">
                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Name</div>

                            <div class="profile-info-value">
                                <span>Adidas</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Logo</div>

                            <div class="profile-info-value">
                                <span><img src="../../../public/img/logo_adidas.png"></span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Location</div>

                            <div class="profile-info-value">
                                <i class="fa fa-map-marker ace-icon bigger-110"></i>
                                <span>U.K.</span>
                                <span>London</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Site</div>

                            <div class="profile-info-value">
                                <span>www.company-site.com</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Activity</div>

                            <div class="profile-info-value">
                                <span>Traiding</span>
                            </div>
                        </div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Post</div>

                            <div class="profile-info-value">
                                <span>Senior trader</span>
                            </div>
                        </div>


                        <div class="hr hr-8 dotted"></div>

                        <div class="profile-info-row">
                            <div class="profile-info-name text-left">Role</div>

                            <div class="profile-info-value">
                                <a href="#" target="_blank">User</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-lg-6 col-12 ml-lg-5 mt-4">
            <div class="">
                <h4 class="widget-title smaller gray mb-2">
                    About Me
                </h4>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <p class="text-justify">
                        My job is mostly lorem ipsuming and dolor sit ameting as long as consectetur adipiscing elit.
                        Sometimes quisque commodo massa gets in the way and sed ipsum porttitor facilisis.
                        The best thing about my job is that vestibulum id ligula porta felis euismod and nullam quis risus eget urna mollis ornare. Thanks for visiting my profile.
                    </p>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "UserProfile",
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

<style scoped>
    .fa-plus-circle{
        color:white;
    }

    .profile-user-info {
        display: table;
        width: 98%;
        width: calc(100% - 24px);
        margin: 0 auto
    }

    .profile-info-row {
        display: table-row
    }

    .profile-info-name,
    .profile-info-value {
        display: table-cell;
        border-top: 1px dotted #D5E4F1
    }

    .profile-info-name {
        text-align: right;
        padding: 6px 10px 6px 4px;
        font-weight: 400;
        color: #667E99;
        background-color: transparent;
        width: 110px;
        vertical-align: middle
    }

    .profile-info-value {
        padding: 6px 4px 6px 6px
    }

    .profile-info-value>span+span:before {
        display: inline;
        content: ",";
        margin-left: 1px;
        margin-right: 3px;
        color: #666;
        border-bottom: 1px solid #FFF
    }

    .profile-info-value>span+span.editable-container:before {
        display: none
    }


       .bigger-110 {
        color: white;
        text-transform: uppercase;
    }


    .user-profile .ace-thumbnails li {
        border: 1px solid #CCC;
        padding: 3px;
        margin: 6px
    }

    .user-profile .ace-thumbnails li .tools {
        left: 3px;
        right: 3px
    }

    .user-profile .ace-thumbnails li:hover .tools {
        bottom: 3px
    }


    .user-title-label+.dropdown-menu {
        margin-left: -12px
    }


    .btn-link:hover .ace-icon {
        color:white;
    }


    .ace-button
    {
        background:#008acb;
    }

    .fa-map-marker {
        color:#008acb;
    }


    a {
        color: #777!important
    }
</style>
