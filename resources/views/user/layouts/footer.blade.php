<footer class="footer-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 col-sm-6">
                <div class="single-footer-widget" id="footer-about">
                    <h6 id="about-mary">{{__('titles.about mary')}}</h6>
                    <p id="about-summery">
                        {{__('about.summary')}}
                    </p>
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
