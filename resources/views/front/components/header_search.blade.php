@section('main_menu')
    <!--TOP SECTION-->
    <div class="row">
        <div class="logo">
            <a href="{{ url('/') }}"><img src="{{ asset("front/images/logos.png") }}" alt=""/>
            </a>
        </div>
        <div class="menu-bar">
            <ul>
            @if (Auth::guest())
                    <li><a href="{{ route('register') }}">Register</a>
                    </li>
                    <li><a href="{{ route('login') }}">Login</a>
                    </li>
                @endif
            
                
                <li><a href="{{ url('/') }}">Home</a>
                </li>
                <li><a href="{{ url('/room_type') }}">Pesan Kamar</a>
                </li>
                <!-- <li><a href="{{ url('/event') }}">Events</a> -->
                </li>
                <!-- <li><a href="{{ url('/food') }}">Food Menu</a> -->
                </li>
                @if(count(\App\Model\Page::where('title', 'About')->where('status', true)->get()) > 0)
                <!-- <li><a href="{{ url('/about') }}">About</a> -->
                </li>
                @endif
                <li><a href="{{ url('/contact') }}">Kontak</a>
                </li>


                
            </ul>
        </div>
    </div>




   
    <!--TOP SECTION-->
@show