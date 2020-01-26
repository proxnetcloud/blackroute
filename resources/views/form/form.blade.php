@extends('layouts.app', ['activePage' => $activePage, 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'User Profile', 'activeButton' => $activeButton])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="section-image">
                <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
                <div class="row">

                    <div class="card col-md-8">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    {{--                                    <h3 class="mb-0">{{ __('Edit Profile') }}</h3>--}}
                                    {{--                                    <h3 class="mb-0"></h3>--}}
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @php
                                if ( !isset($params) ){
                                    $params = [];
                                }
                            @endphp
                            @if($route!='' or isset($params))
                                {{--                            <form method="post" action="{{ route('profile.update') }}" autocomplete="off"--}}
                                {{--                                  enctype="multipart/form-data">--}}
                                <form method="post" action="{{ route($route,$params) }}" autocomplete="off"
                                      enctype="multipart/form-data">
                                    @else
                                        <form method="post" action="{{ route('profile.update') }}" autocomplete="off"
                                              enctype="multipart/form-data">
                                            @endif

                                            @csrf
                                            {{--                                @method('patch')--}}

                                            {{--                                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>--}}




                                            <ul class="nav nav-tabs navform" id="myTab" role="tablist">
                                                @php
                                                    $i = 1;
                                                    if ( !isset($tabs) )
                                                    {
                                                        $tabs = [];
                                                    }
                                                @endphp
                                                @foreach($tabs as $tab)
                                                <li class="nav-item">
                                                    <a class="nav-link @if($i) active @endif" id="{{$tab['name']}}-tab" data-toggle="tab" href="#{{$tab['name']}}" role="tab"
                                                       aria-controls="{{$tab}}"
                                                       aria-selected="@if($i) true @else false @endif">{{$tab['label']}}</a>
                                                </li>
                                                @php
                                                  $i = 0;
                                                @endphp
                                                @endforeach
                                            </ul>


                                            @include('alerts.success')
                                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])

                                            <div class="tab-content" id="myTabContent">
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach($tabs as $tab)
                                                @php
                                                    $fields = $tab['fields'];
                                                @endphp
                                                <div class="tab-pane fade" id="{{$tab['name']}}" role="tabpanel" aria-labelledby="{{$tab['name']}}-tab">
                                                    @if($i)
                                                    <script>
                                                        // $('#personal').show();
                                                        document.getElementById({{$tab['name']}}).style.display = "inline";
                                                    </script>
                                                    @endif
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    <div class="pl-lg-4">
                                                        @foreach($fields as $field)
                                                            @if($field['type'] == 'select')
                                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                    <label class="form-control-label" for="input-name">
                                                                        {{--                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
                                                                        {{$field['label']}}
                                                                    </label>
                                                                    {{--                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}
                                                                    <select type="text" name="{{$field['name']}}" id="input-{{$field['name']}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                                                        @foreach($field['options'] as $option)
                                                                            <option value="{{$option['value']}}">{{$option['text']}}</option>
                                                                        @endforeach
                                                                    </select>

                                                                    @include('alerts.feedback', ['field' => 'name'])
                                                                </div>
                                                            @else
                                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                    <label class="form-control-label" for="input-{{$field['name']}}">
                                                                        {{--                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
                                                                        {{$field['label']}}
                                                                    </label>
                                                                    {{--                                        <input type="{{$field['type']}}" name="{{$field['name']}}" id="input-{{$field['name']}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}
                                                                    @php
                                                                        if(!isset($field['value']) && count($values) > 0)
                                                                        {
                                                                            $aux3 = $field['name'];
                                                                            $field['value'] = $values[$aux3];
                                                                        }
                                                                        else
                                                                        {
                                                                            $field['value'] = '';
                                                                        }
                                                                    @endphp
                                                                    <input type="{{$field['type']}}" name="{{$field['name']}}" id="input-{{$field['name']}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ $field['placeholder']  }}" value="{{ $field['value'] }}" required autofocus>

                                                                    @include('alerts.feedback', ['field' => 'name'])
                                                                </div>
                                                            @endif
                                                        @endforeach

                                                        {{--                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">--}}
                                                        {{--                                        <label class="form-control-label" for="input-name">--}}
                                                        {{--                                            <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
                                                        {{--                                        </label>--}}
                                                        {{--                                        <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}

                                                        {{--                                        @include('alerts.feedback', ['field' => 'name'])--}}
                                                        {{--                                    </div>--}}
                                                        {{--                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">--}}
                                                        {{--                                        <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Email') }}</label>--}}
                                                        {{--                                        <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>--}}

                                                        {{--                                        @include('alerts.feedback', ['field' => 'email'])--}}
                                                        {{--                                    </div>--}}
{{--                                                        <div class="text-center">--}}
{{--                                                            <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                                @endforeach
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr class="my-4" />
                                {{--                            <form method="post" action="{{ route('profile.password') }}">--}}
                                {{--                                @csrf--}}
                                {{--                                @method('patch')--}}

                                {{--                                <h6 class="heading-small text-muted mb-4">{{ __('Password') }}</h6>--}}

                                {{--                                @include('alerts.success', ['key' => 'password_status'])--}}
                                {{--                                @include('alerts.error_self_update', ['key' => 'not_allow_password'])--}}

                                {{--                                <div class="pl-lg-4">--}}
                                {{--                                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">--}}
                                {{--                                        <label class="form-control-label" for="input-current-password">--}}
                                {{--                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Current Password') }}--}}
                                {{--                                        </label>--}}
                                {{--                                        <input type="password" name="old_password" id="input-current-password" class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" placeholder="{{ __('Current Password') }}" value="" required>--}}

                                {{--                                        @include('alerts.feedback', ['field' => 'old_password'])--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">--}}
                                {{--                                        <label class="form-control-label" for="input-password">--}}
                                {{--                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('New Password') }}--}}
                                {{--                                        </label>--}}
                                {{--                                        <input type="password" name="password" id="input-password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('New Password') }}" value="" required>--}}

                                {{--                                        @include('alerts.feedback', ['field' => 'password'])--}}
                                {{--                                    </div>--}}
                                {{--                                    <div class="form-group">--}}
                                {{--                                        <label class="form-control-label" for="input-password-confirmation">--}}
                                {{--                                            <i class="w3-xxlarge fa fa-eye-slash"></i>{{ __('Confirm New Password') }}--}}
                                {{--                                        </label>--}}
                                {{--                                        <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control" placeholder="{{ __('Confirm New Password') }}" value="" required>--}}
                                {{--                                    </div>--}}

                                {{--                                    <div class="text-center">--}}
                                {{--                                        <button type="submit" class="btn btn-default mt-4">{{ __('Change password') }}</button>--}}
                                {{--                                    </div>--}}
                                {{--                                </div>--}}
                                {{--                            </form>--}}
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="card-image">
                                <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="{{ asset('light-bootstrap/img/faces/face-3.jpg') }}" alt="...">
                                        <h5 class="title">{{ __('Mike Andrew') }}</h5>
                                    </a>
                                    <p class="description">
                                        {{ __('michael24') }}
                                    </p>
                                </div>
                                <p class="description text-center">
                                    {{ __(' "Lamborghini Mercy') }}
                                    <br> {{ __('Your chick she so thirsty') }}
                                    <br> {{ __('I am in that two seat Lambo') }}
                                </p>
                            </div>
                            <hr>
                            <div class="button-container mr-auto ml-auto">
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-facebook-square"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-simple btn-link btn-icon">
                                    <i class="fa fa-google-plus-square"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection