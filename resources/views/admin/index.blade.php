@extends('layouts.app')

@section('title')
    <title>Live In Grey Admin Panel</title>
@endsection

@section('content')

    <div class="grid-container">
        <div class="grid-x">
            <div class="cell small-12 middle-12 large-12">
                <div class="top-bar admin">
                    <div class="top-bar-left">
                        <ul class="dropdown menu" data-dropdown-menu>
                            <li class="menu-text">
                                <img class="main-logo" src="{{ asset('img/logo.png') }}" alt=""/>
                            </li>
                        </ul>
                    </div>
                    <div class="top-bar-right">
                        <ul class="menu">
                            <li>Hello {{$user->name}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="admin-tabs-section">
        <div class="grid-container">
            <div class="grid-x">
                <div class="cell small-12 middle-12 large-12">

                    <ul class="tabs" data-tabs id="sections-tabs">
                        @foreach($sections as $index => $section)
                            <li class="tabs-title @if($index == 0)is-active @endif"><a href="#panel{{$section->id}}" aria-selected="true">{{$section->name}}</a></li>
                        @endforeach
                    </ul>

                    <div class="tabs-content" data-tabs-content="sections-tabs">
                        @foreach($sections as $index => $section)
                            <div class="tabs-panel @if($index == 0)is-active @endif" id="panel{{$section->id}}">
                                <h3>{{$section->name}}</h3>
                                @if(!empty($content[$section->id]))
                                    <div class="tab-stuff">
                                        <form method="POST" action="{{route('admin_post')}}">
                                            @csrf
                                            <input type="hidden" value="{{$section->id}}" name="active_tab">
                                            @foreach($content[$section->id] as $item)
                                                <div class="form-group">
                                                    <label for="{{$item['text_ref']}}">{{$item['label']}}</label>
                                                    <textarea name="content[{{$item['id']}}]" id="{{$item['text_ref']}}" cols="30" rows="2">{{$item['content']}}</textarea>
                                                </div>
                                            @endforeach
                                            <button class="admin-save" type="submit">SAVE</button>

                                        </form>
                                    </div>
                                @endif
                                @if($section->name == 'General')

                                    <form method="POST" action="{{route('admin_post')}}">
                                        @csrf
                                        <input type="hidden" value="{{$section->id}}" name="active_tab">
                                        <h4>User Data</h4>
                                        <div class="form-group">
                                            <label for="name">Name</label>

                                            <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>

                                            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="password">New Password</label>

                                            <input id="password" type="password" class="form-control" name="password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                        <h4>Social Links</h4>
                                        @foreach($social_links as $link)
                                            <div class="form-group">
                                                <label for="social_link{{$link['id']}}">{{$link['label']}}:</label>
                                                <input id="social_link{{$link['id']}}" type="text" name="social_link[{{$link['id']}}]" required value="{{$link['value']}}">
                                            </div>
                                        @endforeach

                                        <button class="admin-save" type="submit">SAVE</button>

                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if (Session::has('update_status'))
        <div class="bottom-flash-message">{{ Session::get('update_status') }}</div>
    @endif
@endsection

@section('custom_js')
    <script>

        $( document ).ready(function() {

            var activeTab = '{{$activeTab}}';
            // manually activate tabs
            $('#sections-tabs').foundation();

            // after 3 seconds system removes flash update message from bottom
            if ($('.bottom-flash-message').length > 0) {
                setTimeout(function(){
                    $('.bottom-flash-message').remove();
                }, 3000);
            }

            // if activeTab exists in url we open it
            $('#panel'+activeTab+'-label').click();
        });






    </script>
@endsection