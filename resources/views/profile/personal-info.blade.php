@extends('layouts.profile')

@section('title', 'Personal Info')

@section('content')

    <!--<profile-component></profile-component-->

    <div class="container-fluid bg-profile">
        <div class="container bg-profile">
            <h1 class="page-title">Profile</h1>
            <div class="user-box">
                <img
                    src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces"
                    alt="user avatar">
            </div>
            <p><strong>Hello Andreas,</strong>
                <br>
                glad you're here. A smooth cooperation with our partners is very important to us. If you have any
                problems or questions you can always contact our Team via info@verovis.de turn.</p>
            <div class="row mt-3 panel">
                <div class="col-12">
                    <!--  <nav class="navbar navbar-light bg-light">
                          <a class="navbar-brand">Navbar</a>
                          <form class="form-inline">
                              <a href="/user/edit" class="btn btn-default btn-sm btn-profile-edit pull-right"><i class="fa fa-pencil fa-fw"></i> Bearbeiten</a>
    default btn-sm btn-profile-edit pull-right
                          </form>

                      </nav> -->
                    <div class="container mb-3">
                        <div class="row mx-3 mt-2">
                            <div class="col-10">
                                <h3>Personal Info</h3>
                            </div>
                            <div class="col-2">
                                <button class="btn btn-block btn-sm" id="btn-grey" type="button"><i
                                        class="fa fa-pencil" id="fa-pencil"></i>Edit
                                </button>
                            </div>
                        </div>
                        <div class="profile-line">
                            <hr>
                        </div>

                    </div>
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th scope="row">Name:</th>
                                <td>Mark</td>

                            </tr>
                            <tr>
                                <th scope="row">Sex:</th>
                                <td>Man</td>
                            </tr>
                            <tr>
                                <th scope="row">Language:</th>
                                <td>Larry</td>
                            </tr>
                            <tr>
                                <th scope="row">E-Mail:</th>
                                <td>Larry</td>
                            </tr>
                            <tr>
                                <th scope="row">Homepage:</th>
                                <td>https://homepage.de</td>
                            </tr>
                            <tr>
                                <th scope="row">Telephone:</th>
                                <td>086290118000</td>
                            </tr>
                            <tr>
                                <th scope="row">Adress:</th>
                                <td>Street, 3</td>
                            </tr>
                            <tr>
                                <th scope="row">ZIP code:</th>
                                <td>83233</td>
                            </tr>
                            <tr>
                                <th scope="row">Country:</th>
                                <td>Deutshland</td>
                            </tr>
                            <tr>
                                <th scope="row">Year:</th>
                                <td>1990</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <style>

                #btn-grey {
                    background: #eee;
                    border: 1px solid #ccc;
                    color: #333;
                    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);

                }

                #fa-pencil {
                    color: #3A3A3A;
                    display: inline-block;
                    width: 26px;
                    height: 26px;
                }

                .profile-line {
                    background: linear-gradient(90deg, #232323 0%, #858585 100%);
                    height: 2px;
                    display: block;
                    position: absolute
                }

                .bg-profile {
                    background-color: #f1f1f1;
                    color: #424242;
                    height: 100%;
                    width: 100%;
                }

                .panel {
                    background: #fff;
                    box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
                    margin-bottom: 30px;
                }
                .page-title {
                    text-transform: uppercase;
                    font-weight: normal;
                    margin: 35px 45px 45px 15px;
                    font-size: 1.2em;
                    font-weight: 700;
                    display: inline-block;
                    max-width: 35vw;
                }

            </style>


            <script>

            </script>
@endsection

