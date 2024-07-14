@extends('user.layouts.app')
@section('title', __('titles.contact me'))
@section('content')
    <!-- Start contact-page Area -->
    <section class="contact-page-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 d-flex flex-column address-wrap">

                    <div class="single-contact-address d-flex flex-row">
                        <div class="icon">
                            <span class="lnr lnr-envelope"></span>
                        </div>
                        <div class="contact-details">
                            <h5>kondorimaryam@gmail.com</h5>
                            <p id="query">{{__('titles.Send us your query anytime!')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    @include('messages')
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="form-area " id="contact-form" action="{{route('contact.me.save')}}" method="post" class="contact-form text-right">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 form-group">
                                <input id="full-name" name="full_name" value="{{old('full_name')}}" placeholder="{{__('titles.enter your name')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">

                                <input id="email" name="email"  value="{{old('email')}}"  placeholder="{{__('titles.enter email address')}}" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = {{__('titles.enter email address')}}" class="common-input mb-20 form-control" required="" type="email">

                                <input id="subject" name="subject"  value="{{old('subject')}}"  placeholder="{{__('titles.enter your subject')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = {{__('titles.enter your subject')}}" class="common-input mb-20 form-control" required="" type="text">
                                <div class="mt-20 alert-msg" style="text-align: left;"></div>

                            </div>
                            <div class="col-lg-6 form-group">
                                <textarea id="message" class="common-textarea form-control" name="message" placeholder="{{__('titles.Message')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{__('titles.Message')}}'" required="">{{old('message')}}</textarea>
                                <div class="form-group">
                                    <label for="captcha">Captcha</label>
                                    <div>
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-refresh">Refresh</button>
                                    </div>
                                    <input class="common-input mb-20 form-control" type="text" id="captcha" name="captcha" required>
                                </div>
                                <button type="submit" class="primary-btn mt-20 text-white" style="float: right;">{{__('titles.send message')}}</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>
    <!-- End contact-page Area -->
@endsection
@section('script')
    <script>
        $(document).ready(function (){
            if($('#query').text()!='Send us your query anytime!') {
                $('#query').css('direction','rtl')
                $('#full-name').css('direction','rtl')
                $('#email').css('direction','rtl')
                $('#subject').css('direction','rtl')
                $('#message').css('direction','rtl')
            } else {
                $('#query').css('direction','ltr')
                $('#full-name').css('direction','ltr')
                $('#email').css('direction','ltr')
                $('#subject').css('direction','ltr')
                $('#message').css('direction','ltr')
            }
        })

        $('.btn-refresh').click(function(){
            $.ajax({
                type: 'GET',
                url: 'refresh-captcha',
                success: function(data){
                    $('span').html(data.captcha);
                }
            });
        });
    </script>
@endsection
