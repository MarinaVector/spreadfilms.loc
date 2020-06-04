@extends('layouts.profile')

@section('title', 'Company Settings')

@section('content')




    <div class="container-fluid bg-profile admin-container">
        <div class="container bg-profile">
            <h1 class="page-title mb-3 mt-5">Profile | Company info</h1>
            <br>
            <div class="panel p-4">
                <br>
                <div class="row">
                    <div class="col-3">
                        <p>From <strong>2020</strong></p>
                        <h2>
                            Name
                        </h2>
                    </div>

                    <div class="col-3 offset-6 pull-right img-fluid">
                        <img
                            src="https://i.pinimg.com/originals/c1/d2/6a/c1d26a21b30f15128f19290a0a3b19a0.jpg"
                            class="pull-right company-logo">
                    </div>
                    <div class="col-4">
                        <div class="row">


                            <h5 class="col-12">
                                Activity: <strong>Web development</strong>
                            </h5>


                        </div>
                    </div>

                    <div class="col offset-3">

                    </div>

                    <hr>
                    <div class="col-12">
                        <table class="table">
                            <tbody>
                            <tr>

                                <td>Description</td>

                            </tr>
                            <tr>



                            </tr>
                            </tbody>
                        </table>


                    </div>
                    <hr>
                    <div class="col-8">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.
                        Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus
                        mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa
                        quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo,
                        rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium.
                        Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend
                        tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante,
                        dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet.
                        Quisque rutrum. Aenean imperdiet
                    </div>
                    <div class="col-4">
                        <a href="{{ route('profile.personal-info.edit') }}">
                            <button class="btn btn-block btn-bg btn-sm" type="button"><i
                                    class="fa fa-pencil fa-profile"></i>EDIT
                            </button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <style>
        .btn-grey {
            background: #eee !important;
            border: 1px solid #ccc !important;
            color: #333 !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
        }

        .btn-bg {
            background: #eee !important;
            border: 1px solid #ccc !important;
            color: #333 !important;
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1) !important;
        }

        .btn-bg:hover {
            background: #00bff9 !important;
        }

        .btn-grey:hover {
            color: #00bff9 !important;
        }

        .fa-personal:hover {
            color: #00bff9 !important;
        }

        .fa-profile {
            color: #3A3A3A !important;
            display: inline-block !important;
            width: 26px !important;
            height: 26px !important;
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
            font-size: 1.2em;
            font-weight: 700;
            display: inline-block;
            max-width: 35vw;
        }

        .profile-hello {
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
        }

        .company-logo {
            max-width: 200px;
            height: auto;
        }
    </style>
@endsection
