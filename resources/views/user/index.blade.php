@extends('user.layouts.app')

@section('title', 'Mary Art')

@section('content')

    <!-- Start artworks -->
    <section class="upcoming-event-area section-gap" id="events">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-10">
                    <div class="title text-center">
                        <h1 class="mb-10">Checkout our Upcoming Events</h1>
                        <p>Who are in extremely love with eco friendly system.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 event-left">
                    <div class="single-events">
                        <img class="img-fluid" src="{{asset('user/img/artworks/1.jpg')}}" alt="">
                        <a href="#"><h4>Event on the rock solid carbon</h4></a>
                        <h6><span>21st February</span> at Central government museum</h6>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">View Details</a>
                    </div>
                    <div class="single-events">
                        <img class="img-fluid" src="{{asset('user/img/artworks/2.jpg')}}" alt="">
                        <a href="#"><h4>Event on the rock solid carbon</h4></a>
                        <h6><span>21st February</span> at Central government museum</h6>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">View Details</a>
                    </div>
                </div>
                <div class="col-lg-6 event-right">
                    <div class="single-events">
                        <a href="#"><h4>Event on the rock solid carbon</h4></a>
                        <h6><span>21st February</span> at Central government museum</h6>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">View Details</a>
                        <img class="img-fluid" src="{{asset('user/img/artworks/3.jpg')}}" alt="">
                    </div>
                    <div class="single-events">

                        <a href="#"><h4>Event on the rock solid carbon</h4></a>
                        <h6><span>21st February</span> at Central government museum</h6>
                        <p>
                            inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially.
                        </p>
                        <a href="#" class="primary-btn text-uppercase">View Details</a>
                        <img class="img-fluid" src="img/u4.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End artworks -->

@endsection
