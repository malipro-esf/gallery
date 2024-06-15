<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile dropdown m-t-20">
                        <div class="user-pic">
                            <img src="{{asset('admin/template/assets/images/users/1.jpg')}}" alt="users" class="rounded-circle img-fluid" />
                        </div>
                        <div class="user-content hide-menu m-t-10">
                            <h5 class="m-b-10 user-name font-medium">{{auth()->user()->name}}</h5>
                            <a href="javascript:void(0)" class="btn btn-circle btn-sm m-r-5" id="Userdd" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="false">
                                <i class="ti-settings"></i>
                            </a>
                            <a href="#" onclick="$(this).children(':first').submit()" title="Logout" class="btn btn-circle btn-sm">
                                <form action="{{route('logout')}}" method="post">@csrf</form>
                                <i class="ti-power-off"></i>
                            </a>
                            <div class="dropdown-menu animated flipInY" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-user m-r-5 m-l-5"></i>{{__('titles.My Profile')}}</a>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-email m-r-5 m-l-5"></i>{{__('titles.Inbox')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)">
                                    <i class="ti-settings m-r-5 m-l-5"></i>{{__('titles.Account Setting')}}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" class="logout-link" onclick="$(this).children(':first').submit()">
                                    <form action="{{ route('logout') }}" id="logout-form" method="post">
                                        @csrf
                                    </form>
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i>{{__('titles.Logout')}}</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>
                <!-- User Profile-->
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{route('dashboard')}}
                                   " aria-expanded="false">
                        <i class="icon-Dashboard"></i>
                        <span class="hide-menu">{{__('titles.Dashboard')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Paint-Bucket"></i>
                        <span class="hide-menu">{{__('titles.artwork')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('artwork.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('artwork.create')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Hand"></i>
                        <span class="hide-menu">{{__('titles.technique')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('category.index', ['type' => 'technique'])}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('category.create', ['type' => 'technique'])}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Face-Style"></i>
                        <span class="hide-menu">{{__('titles.style')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('category.index', ['type' => 'style'])}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('category.create', ['type' => 'style'])}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Bulleted-List"></i>
                        <span class="hide-menu">{{__('titles.attributes')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('attribute.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('attribute.create')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('attribute-value.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.attribute values')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-User"></i>
                        <span class="hide-menu">{{__('titles.user')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('user.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('user.create')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Billing"></i>
                        <span class="hide-menu">{{__('titles.bill')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('bill.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('bill.create')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="icon-Settings-Window"></i>
                        <span class="hide-menu">{{__('titles.settings')}} </span>
                    </a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item">
                            <a href="{{route('settings.index')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.list')}} </span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="{{route('settings.create')}}" class="sidebar-link">
                                <i class="mdi mdi-email"></i>
                                <span class="hide-menu">{{__('titles.create')}} </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{route('tag.index')}}" class="logout-link"
                       aria-expanded="false">
                        <i class="mdi mdi-tag"></i>
                        <span class="hide-menu">{{__('titles.tag')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{route('support-ticket.index')}}" class="logout-link"
                       aria-expanded="false">
                        <i class="mdi mdi-ticket"></i>
                        <span class="hide-menu">{{__('titles.support ticket')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{route('contact.index')}}" class="logout-link"
                       aria-expanded="false">
                        <i class="mdi mdi-contacts"></i>
                        <span class="hide-menu">{{__('titles.Contact Us')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       href="{{route('comment.index')}}" class="logout-link"
                       aria-expanded="false">
                        <i class="mdi mdi-comment"></i>
                        <span class="hide-menu">{{__('titles.comments')}}</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                       onclick="$(this).children(':first').submit()"
                       href="#" class="logout-link"
                       aria-expanded="false">
                        <form action="{{ route('logout') }}" id="logout-form" method="post">
                            @csrf
                        </form>
                        <i class="mdi mdi-directions"></i>
                        <span class="hide-menu">{{__('titles.Log Out')}}</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
