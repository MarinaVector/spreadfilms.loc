@extends('layouts.auth')

@section('title', 'Start')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid">
        <div class="row">
            <div class="offset-lg-2 col-xl-4 col-xl-3 px-5 mt-md-5 col-12 from_menu_margin">
                <div class="form-bg">
                    @include('layouts.notifications')
                    <div class="fluid-container">
                        <div class="tab">
                            <button class="tablinks" onclick="openTab(event, 'Create')" name="Create">Create Company
                            </button>
                            <button class="tablinks" onclick="openTab(event, 'Join')" name="Join">Join Company</button>
                        </div>

                        <div id="Create" class="tabcontent">
                            <form action="{{ route('company.store') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control button-height" placeholder="Company's name"
                                           name="name">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit">Create</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id="Join" class="tabcontent">
                            <p>Here's a list of your invitations. If theres any. Apply or decline.</p>
                        </div>
                    </div>
                </div>
                <div class="box-line"></div>
            </div>
        </div>

        <h1 class="ml-5 mx-3">Option 2</h1>


        <div class="row">
            <div class="offset-2 col-lg-3 mt-3">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-card rounded-top">
                            <div class="user-box">

                            </div>
                            <h5 class="mb-1 text-white"></h5>
                            <h2 class="text-light">Our web service</h2>
                        </div>
                        <div class="card-body">
                            <div class="list-group shadow-none">

                                <div class="row text-center mt-4">
                                    <div class="col p-2">
                                        <h4 class="mb-1 line-height-5">154</h4>
                                        <small class="mb-0 font-weight-bold">Сompanies</small>
                                    </div>
                                    <div class="col p-2">
                                        <h4 class="mb-1 line-height-5">2.2k</h4>
                                        <small class="mb-0 font-weight-bold">Followers</small>
                                    </div>
                                    <div class="col p-2">
                                        <h4 class="mb-1 line-height-5">7.1k</h4>
                                        <small class="mb-0 font-weight-bold">Tutorials</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mt-3">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <ul class="nav nav-pills nav-pills-primary nav-justified" id="nav-top">
                            <li class="nav-item">
                                <a href="" data-target="#profile" data-toggle="pill"
                                   class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Create Company</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Join Company</span></a>
                            </li>
                        </ul>
                        <div class="container tab-content p-3">
                            <div class="tab-pane active show row" id="profile">
                                <div class="row">
                                    <div class="col-6">
                                        <label class="col-lg-12 col-form-label form-control-label ml-4 mb-2">You company
                                            name</label>
                                        <div class="col-lg-12">
                                            <input class="form-control ml-4 mb-2" type="text" value="For Example Nike">
                                        </div>
                                        <button type="button" class="btn badge-gray btn-lg text-white mt-2 ml-5 mb-2">
                                            Create
                                        </button>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p>After creating a company, you can invite contributors and flexibly configure
                                            the service to
                                            suit your needs</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="edit">

                                <div class="row">
                                    <div class="col-12 my-5">
                                        Here's a list of your invitations. If theres any. Apply or decline.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <style>
        body {
            font-family: Arial;
        }

        /* Style the tab */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        .tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        .tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        .form-control.button-height {
            height: 42px;
        }
    </style>


    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName('tabcontent');
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = 'none';
            }
            tablinks = document.getElementsByClassName('tablinks');
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(' active', '');
            }
            document.getElementById(tabName).style.display = 'block';
            evt.currentTarget.className += ' active';
        }

        document.addEventListener('DOMContentLoaded', function(event) {
            document.getElementsByName('Create')[0].click();
        });
    </script>
@endsection
