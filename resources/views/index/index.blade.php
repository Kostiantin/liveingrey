@extends('layouts.app')

@section('title')
    <title>{{ config('app.name', 'LiveInGrey') }}</title>
@endsection

@section('content')
    <!-- Main Slogan Section -->
    <div class="callout top-slogan-container">
        <div class="grid-container">
            <div class="main-slogan">
                <h1>{{$content['we_create_authentic']}}</h1>
            </div>
            <div class="sub-slogan">
                {{$content['live_grey_tag']}}
            </div>
        </div>
    </div>

    <!-- Middle Section 1 -->
    <div class="mid-section-1">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 middle-6 large-6">
                    <a href="#" class="article-image-link">
                        <img class="article-image" src="{{ asset('img/article_image.jpg') }}" alt=""/>
                    </a>
                </div>
                <div class="cell small-12 middle-6 large-6">
                    <h3>
                        {{$content['article_header']}}
                    </h3>
                    {!!stripslashes($content['article_text'])!!}
                    <a href="#" class="red-custom-button">
                        {{$content['article_button_text']}}
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Middle Section 2 -->
    <div class="mid-section-2">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 middle-12 large-12">
                    <h2 class="text-center">{{$content['learn_through_experience']}}</h2>
                    <h3 class="text-center">{{$content['our_work_place_text']}}</h3>
                </div>
                <div class="cell small-12 middle-4 large-4 left-cell">
                    <div class="colored-sub-header">
                        <div class="sub-header-text-holder">
                            {{$content['values_work']}}
                        </div>
                    </div>
                    <div class="arrow-down-image-holder">
                        <img class="article-image" src="{{ asset('img/red_down_subtle.png') }}" alt=""/>
                    </div>
                    <div class="description">
                        <h4>01&nbsp;&nbsp;{{$content['values_work']}}</h4>
                        <p>{{$content['values_work_description']}}</p>
                    </div>
                </div>
                <div class="cell small-12 middle-4 large-4 center-cell">
                    <div class="colored-sub-header">
                        <div class="sub-header-text-holder">
                            {{$content['keep_it_real']}}
                        </div>
                    </div>
                    <div class="arrow-down-image-holder">
                        <img class="article-image" src="{{ asset('img/green_down_subtle.png') }}" alt=""/>
                    </div>
                    <div class="description">
                        <h4>02&nbsp;&nbsp;{{$content['keep_it_real']}}</h4>
                        <p>{{$content['keep_it_real_description']}}</p>
                        <p class="special">{{$content['keep_it_real_sub_text']}}</p>
                    </div>
                </div>
                <div class="cell small-12 middle-4 large-4 right-cell">
                    <div class="colored-sub-header">
                        <div class="sub-header-text-holder">
                            {{$content['on_purpose']}}
                        </div>
                    </div>
                    <div class="arrow-down-image-holder">
                        <img class="article-image" src="{{ asset('img/orange_down_subtle.png') }}" alt=""/>
                    </div>
                    <div class="description">
                        <h4>03&nbsp;&nbsp;{{$content['on_purpose']}}</h4>
                        <p>{{$content['on_purpose_description']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Middle Section 3 -->
    <div class="mid-section-3 ceo">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 middle-4 large-4 ceo-img">
                    <img src="{{ asset('img/ceo.png') }}" alt=""/>
                </div>
                <div class="cell small-12 middle-8 large-8 ceo-content">
                    <h3>{{$content['note_from_ceo']}}</h3>
                    <p>
                        {!! stripslashes($content['note_from_ceo_text']) !!}
                    </p>
                    <p class="ceo-name">- {{$content['name_of_ceo']}}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Sections -->
    <footer>

        <!-- Brands -->
        <div class="footer-section-1">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell small-12 middle-12 large-12">
                        <h3 class="text-center">
                            {{$content['who_we_worked_with']}}
                        </h3>
                    </div>
                    <div class="cell small-12 middle-12 large-12">
                        <div class="brands-container">
                            <ul>
                                <li class="iex">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="glint">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="pepsi">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="mkg">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="mls">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="lulu">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="johnson">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="warby">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="madison">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="greatist">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="rich-talent-group">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="do-something">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="charlie-rose">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="sumail">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="we-work">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="timeshop">
                                    <a href="#" class="brands "></a>
                                </li>
                                <li class="poppin">
                                    <a href="#" class="brands "></a>
                                </li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Work With Us -->
        <div class="footer-section-2">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell small-12 middle-12 large-12 text-center">
                        <h3 class="text-center">
                            {{$content['work_with_us']}}
                        </h3>
                        <h4>
                            {{stripslashes($content['curious_text'])}}
                        </h4>
                    </div>
                </div>
                <form>
                    <div class="grid-x">
                        <fieldset class="large-6 cell">

                            <input type="text" placeholder="Name">
                            <input type="text" placeholder="Title">
                            <input type="text" placeholder="Email">
                            <input type="text" placeholder="Company Website">

                        </fieldset>
                        <fieldset class="large-6 cell">
                            <select name="area">
                                <option value="">CULTURE INTEREST AREA</option>
                                <option value="1">BUSINESS</option>
                                <option value="2">AFFILIATE PROGRAM</option>
                                <option value="3">FRIENDSHIP</option>
                            </select>
                            <select name="how-you-find-us">
                                <option value="">HOW DID YOU FIND US</option>
                                <option value="1">GOOGLE</option>
                                <option value="2">SOME ONE TOLD YOU</option>
                                <option value="3">SOCIAL NETWORKS</option>
                            </select>
                            <div class="bottom-check-box-container">
                                <input id="sign-me-up" type="checkbox" name="sign-me-up"><label class="special-checkbox-label" for="sign-me-up">YES, SIGN ME UP FOR UPDATES</label>
                                <input type="submit" class="float-right" value="SEND" onclick="return false;"/>
                            </div>
                        </fieldset>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer Section 3 -->
        <div class="footer-section-3">
            <div class="grid-container">

                <ul>
                    <li class="sign-up-button-container">
                        <a href="#">
                            SIGN UP FOR OUR NEWSLETTER
                        </a>
                    </li>
                    <li class="social-icons-container">
                        @foreach($social_links as $link)
                            <a href="{{$link['value']}}"><i class="fa fa-{{$link['name']}}@if($link['name']=='pinterest')-p @endif" aria-hidden="true"></i></a>
                        @endforeach
                    </li>
                    <li>
                        <span>{!!$content['footer_slogan']!!}</span> | <span>{{$content['design_by']}}</span>
                    </li>
                </ul>

            </div>
        </div>
    </footer>
@endsection
