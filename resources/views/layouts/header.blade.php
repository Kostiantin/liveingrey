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
<div class="top-bar" id="responsive-menu">

        <ul class="menu">
            <li class="social-icons-container">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
            </li>
            <li class="logo-container">
                <a href="#">
                    <img src="{{ asset('img/logo.jpg') }}" alt=""/>
                </a>
            </li>
            <li class="sign-up-button-container">
                <a href="#">
                    {{$content['sign_up_for_our_newsletter']}}
                </a>
            </li>
        </ul>
    </div>
</div>
