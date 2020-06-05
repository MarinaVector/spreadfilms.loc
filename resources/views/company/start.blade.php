@extends('layouts.auth')

@section('title', 'Start')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 mt-3">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        @include('layouts.notifications')
                        <ul class="nav nav-pills nav-pills-primary nav-justified" id="nav-top">
                            <li class="nav-item">
                                <a href="" data-target="#profile" data-toggle="pill" class="nav-link active show">
                                    <i class="icon-user"></i> <span class="hidden-xs">Create Company</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="pill" class="nav-link">
                                    <i class="icon-note"></i> <span class="hidden-xs">Join Company</span>
                                </a>
                            </li>
                        </ul>
                        <div class="container tab-content p-3">
                            <div class="tab-pane active show row" id="profile">
                                <div class="row">
                                    <div class="col-6">
                                        <form action="{{ route('company.create') }}" method="POST">
                                            @csrf
                                            <label class="col-lg-12 col-form-label form-control-label ml-4 mb-2">You company
                                                name</label>
                                            <div class="col-lg-12">
                                                <input class="form-control ml-4 mb-2" type="text" placeholder="Enter company name" name="name">
                                            </div>
                                            <button type="submit" class="btn badge-gray btn-lg text-white mt-2 ml-5 mb-2">
                                                Create
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-6 mt-3">
                                        <p>
                                            After creating a company, you can invite contributors and flexibly configure
                                            the service to suit your needs
                                        </p>
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
    </script>
@endsection
