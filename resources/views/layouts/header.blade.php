{{--@if (Route::has('login'))
    <div class="top-right links">
        @auth
        <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @endauth
    </div>
@endif--}}
<div class="grid-container">

<!-- Custom mobile menu -->
<div class="custom-mobile-menu">
    <button class="menu-icon" type="button"></button>
    <a href="#">
      <img class="mobile-logo" src="{{ asset('img/logo.png') }}" alt=""/>
    </a>
</div>
<div class="mobile-menu-content">
    <ul class="mobile-menu">
        <li class="social-icons-container text-left">
            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
        </li>
        <li class="sign-up-button-container text-left">
            <a href="#">
                {{$content['sign_up_for_our_newsletter']}}
            </a>
        </li>
    </ul>
</div>
<!-- Custom mobile menu end -->


<div class="top-bar" id="responsive-menu">

        <ul class="menu">
            <li class="social-icons-container text-left">
                @foreach($social_links as $link)
                    <a href="{{$link['value']}}"><i class="fa fa-{{$link['name']}}@if($link['name']=='pinterest')-p @endif" aria-hidden="true"></i></a>
                @endforeach
            </li>
            <li class="logo-container text-center">
                <a href="#">
                    <img class="main-logo" src="{{ asset('img/logo.png') }}" alt=""/>
                    <img class="logo-grey" src="{{ asset('img/logo_grey.png') }}" alt=""/>
                </a>
            </li>
            <li class="sign-up-button-container text-right">
                <a href="#">
                    {{$content['sign_up_for_our_newsletter']}}
                </a>
            </li>
        </ul>
    </div>
</div>
