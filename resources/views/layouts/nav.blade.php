<div class="container-fluid">
    <div class="row">
        <div class="col-lg-2 d-lg-block d-none main-menu">
            <div class="row" v-on:mouseover="toggleElem">
                <div class="col-10 offset-1 my-5 mx-2">
                    <div>
                        <img class="logo mt-3" src="img/logo_white.png">
                    </div>
                </div>
                <div class="col-xl-3 mb-2 mt-4 ml-4">
                    <div>
                        <i class="fa fa-user fa-2x sidebar-icon mr-4" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-xl-6 mb-2 mt-4">
                    <a href="/login"><span class="nav-text ml-3 d-none d-sm-block" v-if="show">Login</span></a>
                </div>

                <div class="col-xl-3 ml-4">
                    <i class="fa fa-user fa-2x sidebar-icon mr-4"></i>
                </div>
                <div class="col-xl-6">
                    <a href="/register"><span class="nav-text ml-3 d-none d-sm-block" v-if="show">Registrieren</span></a>
                </div>

            </div>
        </div>
        <div class="col-12 d-block d-lg-none mb-5">
            <div class="fixed-top">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="container">
                        <div class="row bg-dark p-4">

                            <div class="col-12">
                                <i class="fa fa-user fa-2x sidebar-icon mr-4" aria-hidden="true"></i>
                                <a href="/login"><span class="nav-text">Login</span></a>
                            </div>

                            <div class="col-12">
                                <i class="fa fa-user fa-2x sidebar-icon mr-4" aria-hidden="true"></i>
                                <a href="/register"><span class="nav-text">Registrieren</span></a>
                            </div>

                        </div>
                    </div>
                </div>

                <nav class="navbar navbar-dark bg-dark">
                    <div class="container">
                        <div class="row">
                            <div class="col-4">
                                <img class="logo" src="img/logo_white.png">

                            </div>
                            <div class="col-4 offset-4">

                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>
