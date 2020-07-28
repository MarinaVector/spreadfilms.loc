@extends('layouts.profile')

@section('title', 'Manage tutorials')

@section('content')

    <div class="container-fluid admin-container">
        @include('layouts.notifications')
        <h1 class="page-title">{{ __('messages.Tutorials')}}</h1>

        <div class="btn-group group-actions" role="group">
            <a href="{{ route('module.tutorials.add') }}" class="btn btn-admin ">
                <i class="fas fa-plus-circle fas-admin mr-2"></i>Add tutorial
            </a>
        </div>

        <div class="container">
            <div class="row">
                    <div class="col-lg-1 mb-2">
                        <p class="mt-4"><span class="categories mt-2 mr-2">Categories:</span></p>
                    </div>
                    <div class="col-lg-2 mb-2">
                        <p class="mt-4"><span class="p-2 bg-light shadow rounded btn-block mx-auto">Categorie1</span>
                        </p>
                    </div>
                    <div class="col-lg-2  mb-4">
                        <p class="mt-4"><span class="p-2 bg-light shadow rounded btn-block mx-auto">Categorie2</span>
                        </p>
                    </div>
                    <div class="col-lg-2 mb-4">
                        <p class="mt-4"><span class="p-2 bg-light shadow rounded btn-block mx-auto">Categorie3</span>
                        </p>
                    </div>
                </div>
            <tutorials-admin-list :tutorials="'{{ $companyTutorials->toJson() }}'"></tutorials-admin-list>
        </div>





<!--for future -->


   <!-- <div class="col-lg-12 col-sm-12 mt-n3">
        <div class="card-body card2">
            <div class="row">
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-lg-1 pl-3">
                            <i class="fas fa-arrows-alt-v ml-5 fa-2x"></i>
                        </div>
                        <div class="col-lg-11">
                            <p class="card-title big-arrow">List main</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-1">
                    <a href="#" class="social-icon si-border si-edit mr-1">
                        <i class="fas fa-edit"></i>
                        <i class="fas fa-edit"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    -->







@endsection
