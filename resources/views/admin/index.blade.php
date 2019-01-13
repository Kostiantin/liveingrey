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
                                <img class="main-logo" src="@if (empty($logoImg)) {{ asset('img/logo.png') }} @else {{asset('uploads/'.$logoImg)}} @endif" alt=""/>
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
                            <li class="tabs-title @if($index == 0)is-active @endif">
                                <a href="#panel{{$section->id}}" aria-selected="true">{{$section->name}}</a>
                            </li>
                        @endforeach
                    </ul>

                    <div class="tabs-content" data-tabs-content="sections-tabs">
                        @foreach($sections as $index => $section)
                            <div class="tabs-panel @if($index == 0)is-active @endif" id="panel{{$section->id}}">
                                <h3>{{$section->name}}</h3>

                                <!-- TABS FOR FRONT END CONTENT TEXTS -->
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

                                <!-- GENERAL TAB CONTENT -->
                                @if($section->name == 'General')

                                    <form method="POST" action="{{route('admin_post')}}" id="user-and-social-links" enctype="multipart/form-data">

                                        @csrf

                                        <input type="hidden" value="{{$section->id}}" name="active_tab">
                                        <input type="hidden" name="user_id" value="{{$user->id}}"/>


                                        <h4>Logo</h4>
                                        <div class="form-group">
                                            <label for="logo"><strong>Perfect logo size is 250x28 pixels</strong></label>
                                            <input type="file" class="form-control-file" name="logo" id="logo" aria-describedby="fileHelp">
                                            @if ($errors->has('logo'))
                                                <span class="help-block">
                                                    {{ $errors->first('logo') }}
                                                </span>
                                            @endif

                                            @if(!empty($logoImg))
                                                <a href="{{route('restore_default_logo')}}/?active_tab={{$section->id}}" class="red-custom-button restore-logo">Restore Default Logo</a>
                                            @endif
                                        </div>


                                        <h4>User Data</h4>

                                        <div class="form-group">
                                            <label for="name">Name</label>

                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name',$user->name) }}" required autofocus>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>

                                            <input id="email" type="text" class="form-control" name="email" value="{{ old('email',$user->email) }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                   {{ $errors->first('email') }}
                                                </span>
                                            @endif

                                        </div>

                                        <div class="form-group">
                                            <label for="password">New Password</label>

                                            <input id="password" type="password" class="form-control" name="password" value="{{old('password','')}}">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    {{ $errors->first('password') }}
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation','')}}">
                                            </div>
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


            // manually activate tabs
            $('#sections-tabs').foundation();

            var activeTab = '{{$activeTab}}';

            if ($('#user-and-social-links .help-block').length > 0) {
                //tabs-panel
                activeTab = $('#user-and-social-links').parent().attr('id').replace('panel','');

            }

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