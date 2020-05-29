@extends('layouts.auth')

@section('title', 'Start')

@section('content')
    <!--suppress HtmlFormInputWithoutLabel -->
    <div class="row page-register">
        <div class="offset-lg-2 col-xl-4 col-xl-3 px-5 mt-md-5 col-12 from_menu_margin">
            <div class="form-bg">
                @include('layouts.notifications')
                <div class="fluid-container">
                    <div class="tab">
                        <button class="tablinks" onclick="openTab(event, 'Create')" name="Create">Create Company</button>
                        <button class="tablinks" onclick="openTab(event, 'Join')" name="Join">Join Company</button>
                    </div>

                    <div id="Create" class="tabcontent">
                        <form action="{{ route('company.store') }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control button-height" placeholder="Company's name" name="name">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-success" type="submit">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div id="Join" class="tabcontent">
                        <p>Here's a list of your invitations. If theres any. Apply or decline</p>
                    </div>
                </div>
            </div>
            <div class="box-line"></div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>
        body {font-family: Arial;}

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

        .form-control.button-height{
            height: 42px;
        }
    </style>

    <script>
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementsByName("Create")[0].click();
        });
    </script>
@endsection
