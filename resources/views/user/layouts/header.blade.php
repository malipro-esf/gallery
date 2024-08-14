<header id="header" id="home">
    <div class="container header-top">
        <div class="row">
            <div class="col-6 top-head-left">
                <ul>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">
                            {{__('titles.language')}}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right  animated bounceInDown" aria-labelledby="navbarDropdown2">
                            <a class="header-flag" data-id="persian" href="{{route('set.locale',['locale' => 'fa'])}}">{{__('titles.Persian')}}</a><a href="{{route('set.locale',['locale' => 'fa'])}}"><img  alt="Iran" src="{{asset('images/flags/ir.jpg')}}"></a>
                            <a class="header-flag" data-id="english" href="{{route('set.locale',['locale' => 'en'])}}">{{__('titles.English')}}</a><a href="{{route('set.locale',['locale' => 'en'])}}"><img alt="united kingdom" src="{{asset('images/flags/gb.jpg')}}"></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-6 top-head-right">
                <ul>
                    <li><a href="https://www.instagram.com/painter.mariy" target="_blank"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="https://www.facebook.com/painter.mariy"><i class="fa fa-facebook"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <hr>
    <div class="container">
        <div class="row align-items-center justify-content-between d-flex">
            <div id="logo">
                <a href="index.html"><img src="{{asset('user/img/logo.png')}}" alt="" title="" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu" id="ul-nav-menu">
                    <li class="menu-active"><a href="{{url('/')}}">{{__('titles.home')}}</a></li>
                    <li><a href="gallery.html">{{__('titles.artworks')}}</a></li>
                    <li><a href="gallery.html">{{__('titles.wall murals')}}</a></li>
                    <li><a href="{{route('blogs')}}">{{__('titles.blog')}}</a></li>
                    <li><a href="{{route('about.mary')}}">{{__('titles.about mary')}}</a></li>
                    <li><a href="{{route('contact.me')}}">{{__('titles.contact me')}}</a></li>
                </ul>
            </nav><!-- #nav-menu-container -->


        </div>
    </div>
</header><!-- #header -->
