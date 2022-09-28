@extends('admin.master')
@section('title','dashboard')
@section('content')
    <div class="container-fluid">

        <div class="card-group">
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                                    <span class="btn btn-circle btn-lg bg-success">
                                        <i class="ti-paint-bucket text-white"></i>
                                    </span>
                        </div>
                        <div>
                            {{__('titles.artworks')}}

                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$artsCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
        <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                             <span class="btn btn-circle btn-lg bg-success">
                                <i class="ti-shopping-cart text-white"></i>
                            </span>
                        </div>
                        <div>
                            {{__('titles.sold')}}
                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$billsCount->where('verification_status','accepted')->count()}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="m-r-10">
                            <span class="btn btn-circle btn-lg btn-info">
                                <i class="ti-user text-white"></i>
                            </span>
                        </div>
                        <div>
                            {{__('titles.users')}}

                        </div>
                        <div class="ml-auto">
                            <h2 class="m-b-0 font-light">{{$usersCount}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Card -->
        <!-- Column -->
        </div>
    </div>

@endsection
