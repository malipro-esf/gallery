<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget" id="footer-about">
                    <h6 id="about-mary">{{__('titles.about mary')}}</h6>
                    <p id="about-summery">
                        {{__('about.summary')}}
                    </p>
{{--                    <p class="footer-text">--}}
{{--                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> and distributed by <a href="https://themewagon.com" target="_blank">ThemeWagon</a>--}}
{{--                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                    </p>--}}
                </div>
            </div>
            <div class="col-lg-5  col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h6 id="newsletter">{{__('titles.Newsletter')}}</h6>
                    <p id="latest">{{__('titles.Stay update with our latest')}}</p>
                    <div class="" id="mc_embed_signup">
                        <form  novalidate="true" action="{{url('newsletter')}}" method="post" class="form-inline">
                            @csrf
                            <input id="footer-email" class="form-control" name="email" placeholder="{{__('titles.enter email address')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = {{__('titles.enter email address')}}" required="" type="email">
                            <button type="submit" class="click-btn btn btn-default"><span class="lnr lnr-arrow-right"></span></button>
{{--                            <div style="position: absolute; left: -5000px;">--}}
{{--                                <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">--}}
{{--                            </div>--}}

                            <div class="info"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                <div class="single-footer-widget">
                    <h6 id="follow-me">{{__('titles.Follow Me')}}</h6>
                    <p id="let-social">{{__('titles.let us be social')}}</p>
                    <div id="social-icons" class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
