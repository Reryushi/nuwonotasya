@section('top-navbar')

<nav class="navbar navbar-default">

    <div class="container-fluid">
        <div class="navbar-minimize">
            <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
        </div>
        
        <div class="navbar-header">
            <button type="button" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar bar1"></span>
                <span class="icon-bar bar2"></span>
                <span class="icon-bar bar3"></span>
            </button>
            
                <a class="navbar-brand" href="{{url('/admin')}}">
                    Home 
                </a>
              
                
            
        </div>
        
        <div class="collapse navbar-collapse">
 
            <form class="navbar-form navbar-left navbar-search-form" role="search">
                <div class="input-group">
                    <li style="font-size:14px"><span style="color:red">red : pending booking</span></li>
                    <li style="font-size:14px"><span style="color:green">green : Uploaded pembayaran (need confirmation)</span></li>  
                    Pesanan akan tercancel jika status pending tidak dirubah menjadi check-in selama 4 jam
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right" id="refresh">

                <li class="dropdown">
                    <a href="#notifications" class="dropdown-toggle btn-rotate" data-toggle="dropdown">
                        <span style="color:white" class="label-danger label">{{$jml_pending}}</span>
                        <span style="color:white" class="label label-success">{{$jml_paid}}</span>
                        
                        <i class="ti-settings"></i>
                        <p class="hidden-md hidden-lg">
                            Notifications
                            <b class="caret"></b>
                        </p>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a>pending : <span style="color:red">{{$jml_pending}}</span></a></li>
                        <li><a>Uploaded pembayaran (need confirmation) : <span style="color:green">{{$jml_paid}}</span></a></li>
                        <li><a href="{{ url('admin/user/'.Auth::user()->id.'/profile') }}">Edit Profile</a></li>
                        <li><a href="{{ url('/') }}">Visit App</a></li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    @show