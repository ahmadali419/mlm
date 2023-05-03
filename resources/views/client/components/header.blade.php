<!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">{{Auth::user()->name ?? ''}}</span><span class="user-status">{{Auth::user()->status == null || Auth::user()->status == "Reject" ? 'Pending' : 'Approved'}}</span></div><span class="avatar">
                            @if(auth()->user()->profile_pic==null)
                                <img
                                class="round" src="../../../app-assets/images/portrait/small/avatar-s-11.jpg" alt="avatar"
                                height="40" width="40">
                                @else
                                <img class="round"  height="40" width="40" alt="User Image" src="{{ URL::to(auth()->user()->profile_pic ?? '') }}">
                                @endif
                                <span class="avatar-status-online"></span></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user"><a class="dropdown-item" href="{{route('client.profile')}}"><i class="me-50" data-feather="user"></i> Profile</a>
                        <div class="dropdown-divider"></div><a class="dropdown-item" href="{{route('client.settings')}}"><i class="me-50" data-feather="settings"></i> Settings</a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"><i class="me-50"
                                data-feather="power"></i> Logout</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <!-- END: Header-->