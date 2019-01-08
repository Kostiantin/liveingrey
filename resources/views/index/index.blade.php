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
                    <a href="#">
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
                        {{$content['values_work']}}
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
                        {{$content['keep_it_real']}}
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
                        {{$content['on_purpose']}}
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

    <!-- Footer Section -->
    <footer>
        <div class="footer-section-1">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell small-12 middle-12 large-12">
                        <h3 class="text-center">
                            {{$content['who_we_worked_with']}}
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </footer>
@endsection
