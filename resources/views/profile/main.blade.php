@extends('layouts.profile')

@section('title', 'Profile')

@section('content')

    <!--<profile-component></profile-component> -->
    <div class="container-fluid">
        <div class="row">
            <div class="offset-2 col-lg-3 mt-3">
                <div class="profile-card-4 z-depth-3">
                    <div class="card">
                        <div class="card-body text-center bg-card rounded-top">
                            <div class="user-box">
                                <img
                                    src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces"
                                    alt="user avatar">
                            </div>
                            <h5 class="mb-1 text-white">{{ $authUser->firstname }}</h5>
                            <h6 class="text-light">Senior trader</h6>
                            <h6 class="text-light">Admin Level2</h6>
                        </div>
                        <div class="card-body">
                            <ul class="list-group shadow-none">
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>9XXXXXXXXX</span>
                                        <small>Phone</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>{{ $authUser->email }}</span>
                                        <small>E-mail</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>www.example.com</span>
                                        <small>Website</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>Deutshland</span>
                                        <small>Country</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>01257</span>
                                        <small>Zip code</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=" "></i>
                                    </div>
                                    <div class="list-details">
                                        <span>Palma, 33</span>
                                        <small>Adress</small>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-icon">
                                        <i class=""></i>
                                    </div>
                                    <div class="list-details">
                                        <span>DE</span>
                                        <small>language</small>
                                    </div>
                                </li>
                            </ul>
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
                                   class="nav-link active show"><i class="icon-user"></i> <span class="hidden-xs">Profile</span></a>
                            </li>
                            <li class="nav-item">
                                <a href="" data-target="#edit" data-toggle="pill" class="nav-link"><i
                                        class="icon-note"></i> <span class="hidden-xs">Edit</span></a>
                            </li>
                        </ul>
                        <div class="container tab-content p-3">
                            <div class="tab-pane active show" id="profile">

                                <div class="row">
                                    <div class="col-lg-10 ml-3">
                                        <h4 class="mb-3">About</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo
                                            ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis
                                            parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium quis, sem. </p>
                                    </div>
                                    <div class="col-5 col-md-5 ml-3">
                                        <h4 class="mb-3 mt-3">Tutorials</h4>
                                        <div class="tutorials-part mb-2">
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">security</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">rules</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">covid-19</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">oil</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">finance</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">staff-management</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">exchange-risks</a>
                                        <a href="" class="btn btn-outline-dark btn-sm mr-1 mb-1">exchange-management</a>
                                        </div>
                                        <div class="mt-2 mb-3">
                                        <hr>
                                        </div>


                                      <!--  <div class="badge-gray btn btn-block text-white my-2"><span
                                                class="fa fa-eye before fa-fw"></span>View tutorials
                                        </div>
                                        <div class="badge-red btn btn-block text-white my-2"><span
                                                class="fa fa-cog fa-fw"></span>Edit security
                                        </div> -->
                                        <button type="button" class="btn badge-gray btn-lg text-white btn-block mt-2">View tutorials</button>
                                        <button type="button" class="btn badge-gray btn-lg text-white btn-block mt-2">Edit security</button>


                                    </div>
                                    <div class="col-6 ml-3">


                                        <div class="card-box">
                                            <h4 class="header-title mb-3">Company</h4>
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td>{{ $userCompany->name }}</td>

                                                    </tr>
                                                    <tr>
                                                        <td>Website</td>
                                                        <td>12345.com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Logo</td>
                                                        <td>
  <i class="fa fa-futbol-o"></i>

</td>
                                                    </tr>
                                                    <tr>
                                                        <td>E-mail</td>
                                                        <td>company-mail@com</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Adress</td>
                                                        <td>Palma, 33</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Discription</td>
                                                        <td>Best Company</td>
                                                    </tr>


                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="edit">
                                <form>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">First name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{ $authUser->firstname }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Last name</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="{{ $authUser->firstname }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">E-mail</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="email" value="{{ $authUser->email }}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Foto</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="file">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Website</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="url" value="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">ZipCode</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="" placeholder="Street">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Address</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="" placeholder="Street">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Company</label>
                                        <div class="col-lg-7">
                                            <input class="form-control" type="text" value="jhonsanmark">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Role</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="text" value="Admin Level2">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label">Status</label>
                                        <div class="col-lg-9">
                                            <input class="form-control" type="password" value="11111122333">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-secondary" value="Cancel">
                                            <input type="button" class="btn btn-primary" value="Save Changes">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
