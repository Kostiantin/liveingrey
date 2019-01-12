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

                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif

                                        </div>

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
            $('#sections-tabs').foundation();
        });

        if ($('.bottom-flash-message').length > 0) {
            setTimeout(function(){
                $('.bottom-flash-message').remove();
            }, 3000);
        }
    </script>
@endsection