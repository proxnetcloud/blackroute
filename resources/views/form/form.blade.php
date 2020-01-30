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
                            <form method="post" action="{{ route($route) }}" autocomplete="off"
                              enctype="multipart/form-data">
                            @endif

                                @csrf
            {{--                                @method('patch')--}}

{{--                                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>--}}

{{--                                            @php--}}
{{--                                                $_fields = [];--}}
{{--                                                if ( count($tabs) == 0 )--}}
{{--                                                {--}}
{{--                                                    $tabs[] = [--}}
{{--                                                        'name' => 'null',--}}
{{--                                                        'label' => 'null',--}}
{{--                                                    ];--}}
{{--                                                }--}}
{{--                                            @endphp--}}
{{--                                            @foreach($tabs as $tab)--}}
{{--                                            @php--}}
{{--                                              foreach($tabs as $tab)--}}
{{--                                                {--}}
{{--//--}}{{--                                            @forelse($tabs as $tab)--}}
{{--//                                                @php--}}
{{--                                                    $_fields[$tab['name']] =--}}
{{--                                                        ['tab_label'=>$tab['label']--}}
{{--                                                            ,'fields'=>''];--}}
{{--                                                    //$tabs[$field['tab']['name']] =--}}
{{--                                                    //    ['tab_label'=>$field['tab']['label']--}}
{{--                                                    //        ,'fields'=>''];--}}
{{--                                                }--}}
{{--                                            @endphp--}}
{{--                                            @empty--}}
{{--                                                @php--}}
{{--                                                    $_fields[$tab['name']] =--}}
{{--                                                        ['tab_label'=>$tab['label']--}}
{{--                                                            ,'fields'=>''];--}}
{{--                                                    //$tabs[$field['tab']['name']] =--}}
{{--                                                    //    ['tab_label'=>$field['tab']['label']--}}
{{--                                                    //        ,'fields'=>''];--}}
{{--                                                @endphp--}}
{{--                                            @endforelse--}}
{{--                                            @endforeach--}}
{{--                                                @foreach($fields as $field)--}}
{{--                                                @php--}}
{{--                                                  foreach($fields as $field)--}}
{{--                                                {--}}
{{--//                                                @php--}}
{{--                                                    if ( count($field['tab']) == 0  )--}}
{{--                                                    {--}}
{{--                                                        $field['tab']['name'] = 'null';--}}
{{--                                                    }--}}
{{--//                                                @endphp--}}
{{--                                                @if($field['type'] == 'select')--}}
{{--                                                    @php--}}
{{--                                                    $_fields[$field['tab']['name']]['fields'] .=--}}
{{--                                                    '--}}
{{--                                                    <div class="form-group'. $errors->has('name') ? ' has-danger' : '' .'">--}}
{{--                                                        <label class="form-control-label" for="input-'.$field['name'].'">--}}
{{--                                                        '.--}}
{{--                                                            $field['label']--}}
{{--                                                        .'--}}
{{--                                                        </label>--}}
{{--                                                        <select type="text" name="'.$field['name'].'" id="input-'.$field['name'].'" class="form-control'. $errors->has('name') ? ' is-invalid' : '' .'" placeholder="" value="" required autofocus>--}}
{{--                                                    ';--}}
{{--                                                    @endphp--}}
{{--                                                    @foreach($field['options'] as $option)--}}
{{--                                                    @php--}}
{{--                                                    foreach($field['options'] as $option)--}}
{{--                                                    {--}}
{{--//                                                        @php--}}
{{--                                                            $_fields[$field['tab']['name']]['fields'] .=--}}
{{--                                                            '--}}
{{--                                                              <option value="'.$option['value'].'">'.$option['text'].'</option>--}}
{{--                                                        ';--}}
{{--                                                        @endphp--}}
{{--                                                    @php--}}
{{--                                                    }--}}
{{--                                                    @endphp--}}
{{--                                                    @endforeach--}}
{{--                                                    @php--}}
{{--                                                        $_fields[$field['tab']['name']]['fields'] .=--}}
{{--                                                            '--}}
{{--                                                            </select>';--}}
{{--                                                    @endphp--}}

{{--                                                        @include('alerts.feedback', ['field' => 'name'])--}}
{{--                                                    @php--}}
{{--                                                        $_fields[$field['tab']['name']]['fields'] .=--}}
{{--                                                            '--}}
{{--                                                                    </div>';--}}
{{--                                                    @endphp--}}
{{--                                                @else--}}
{{--                                                    @php--}}
{{--                                                        if(!isset($field['value']) && count($values) > 0)--}}
{{--                                                        {--}}
{{--                                                            $field['value'] = $values[$field['name']];--}}
{{--                                                        }--}}
{{--                                                        else--}}
{{--                                                        {--}}
{{--                                                            $field['value'] = '';--}}
{{--                                                        }--}}
{{--                                                        $_fields[$field['tab']['name']]['fields'] .= '--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label class="form-control-label" for="input-'.$field['name'].'">--}}
{{--                                                    '.--}}
{{--                                                        $field['label']--}}
{{--                                                        .'--}}
{{--                                                    </label>--}}
{{--                                                    <input type="'.$field['type'].'" name="'.$field['name'].'"--}}
{{--                                                        id="input-'.$field['name'].'" class="form-control"--}}
{{--                                                        placeholder="'.$field['placeholder'].'"--}}
{{--                                                        value="'.$field['value'].'" required autofocus>--}}
{{--                                                ';--}}
{{--                                                    @endphp--}}
{{--                                                        @php--}}
{{--                                                        @endphp--}}

{{--                                                        @include('alerts.feedback', ['field' => 'name'])--}}
{{--                                                    </div>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                            @php--}}
{{--                                            }--}}
{{--                                            @endphp--}}


                                            <ul class="nav nav-tabs navform" id="myTab" role="tablist">
                                                @php
                                                    $i = 1;
                                                    if ( !isset($tabs) )
                                                    {
                                                        $tabs = [];
                                                    }
                                                @endphp
{{--                                                @foreach($tabs as $tab)--}}
{{--                                                $tabs[$tab['name']] =--}}
{{--                                                ['tab_label'=>$tab['label']--}}
{{--                                                ,'fields'=>''];--}}
{{--                                                @foreach($fields as $tab_name => $field)--}}
                                                @foreach($tabs as $tab)
{{--                                                @php--}}
{{--                                                foreach($tabs as $tab)--}}
{{--                                                {--}}
//{{--                                                @php--}}
//{{--                                                    $tab = [];--}}
//{{--                                                    $tab['name'] = $tab_name;--}}
//{{--                                                    $tab['label'] = $field['tab_label'];--}}
//{{--                                                @endphp--}}
{{--                                                @endphp--}}
{{--                                                    @if($tab['name']!='null')--}}
                                                    @if(count($tabs) != 1)
                                                    <li class="nav-item">
                                                        <a class="nav-link @if($i) active @endif" id="{{$tab['name']}}-tab" data-toggle="tab" href="#{{$tab['name']}}" role="tab"
                                                           aria-controls="{{$tab['name']}}"
                                                           aria-selected="@if($i) true @else false @endif">{{$tab['label']}}</a>
                                                    </li>
                                                    @endif
                                                    @php
                                                      $i = 0;
                                                    @endphp
                                                @endforeach
{{--                                                @php--}}
{{--                                                }--}}
{{--                                                @endphp--}}
                                            </ul>


                                            @include('alerts.success')
                                            @include('alerts.error_self_update', ['key' => 'not_allow_profile'])
{{--                                            @if($fields[0]['tab']['name']!='null')--}}
                                            @if(count($tabs)!=1)
                                            <div class="tab-content" id="myTabContent">
                                            @endif
                                                @php
                                                    $i = 1;
                                                @endphp
{{--                                                $tabs[$tab['name']] =--}}
{{--                                                ['tab_label'=>$tab['label']--}}
{{--                                                ,'fields'=>''];--}}
                                                @foreach($tabs as $tab)
{{--                                                @foreach($_fields as $tab_name => $field)--}}
{{--                                                @php--}}
{{--                                                foreach($_fields as $tab_name => $field)--}}
{{--                                                {--}}
{{--                                                @endphp--}}
{{--                                                @php--}}
{{--                                                    //$fields = $tab['fields'];--}}
{{--                                                    $tab = [];--}}
{{--                                                    $tab['name'] = $tab_name;--}}
{{--                                                @endphp--}}
{{--                                                @if($fields[0]['tab']['name']!='null')--}}
                                                @if(count($tabs)!=1)
{{--                                                <div class="tab-pane fade" id="{{$tab['name']}}" role="tabpanel" aria-labelledby="{{$tab['name']}}-tab">--}}
                                                <div class="tab-pane @if($i) active @endif" id="{{$tab['name']}}" role="tabpanel" aria-labelledby="{{$tab['name']}}-tab">
                                                    @if($i)
                                                    <script>
                                                        // $('#personal').show();
                                                        //document.getElementById('{{$tab['name']}}').style.display = "inline";
                                                        //document.getElementById('{{$tab['name']}}').style.display = "block";
                                                    </script>
                                                    @endif
                                                @endif
                                                    @php
                                                        $i = 0;
                                                    @endphp
                                                    <div class="pl-lg-4">
{{--                                                        {{$field['fields']}}--}}
{{--                                                        @php--}}
{{--                                                            $fields = $tab['fields'];--}}
{{--                                                        @endphp--}}
{{--                                                        @foreach($tab['models'] as $models)--}}
                                                        @foreach($tab['models'] as $model)
{{--                                                        @foreach($fields as $field)--}}
{{--                                                        <div id="@isset($model['action']['id']) {{$model['action']['id']}} @endisset"--}}
{{--                                                             style="display: @isset($model['action']['display']){{$model['action']['display']}}@endisset"--}}
{{--                                                            >--}}
{{--                                                        @foreach($models as $model)--}}
{{--                                                        <div id="@isset($model['action']['id']){{$model['action']['id']}}@endisset"--}}
                                                        <div class="@if(isset($model['action']['class']))
                                                                        {{$model['action']['class']}}
                                                                    @elseif(isset($model['action']['id']))
                                                                        {{$model['action']['id']}}
                                                                    @endif"
                                                             style="display: @isset($model['action']['display']){{$model['action']['display']}}@endisset"
                                                        >
                                                        @foreach($model['fields'] as $field)
                                                            @if($field['type'] == 'select')
                                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                    <label class="form-control-label" for="input-name">
{{--                                                                                                                    <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
                                                                        {{$field['label']}}
                                                                        @if(isset($model['label']) && !empty($model['label']))
{{--                                                                            - --}}
                                                                            {{$model['label']}}
                                                                        @endif
                                                                    </label>
{{--                                                                    <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}
                                                                    @php
                                                                        $select = [];

                                                                        $mystring = $field['name'];
                                                                        $findme = '__';
                                                                        $pos = strpos($mystring, $findme);
                                                                        $select['field'] = substr($mystring, 0,$pos);
                                                                    @endphp
                                                                    <select type="text" onchange="f_{{$field['name']}}(this)" name="{{$field['name']}}" id="input-{{$field['name']}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>
                                                                        @foreach($field['options'] as $option)
                                                                            <option value="{{$option['value']}}">{{$option['text']}}</option>
{{--                                                                        @foreach($actions as $action)--}}
{{--                                                                            @isset($model['action']['option'])--}}
{{--                                                                            @if($model['action']['select']==$field['name'])--}}
{{--                                                                            @if($model['action']['option']==$option['value'])--}}
{{--                                                                            @if($action['select']==$field['name'])--}}
{{--                                                                        @foreach($actions as $action)--}}
                                                                                <script>
                                                                                    function hide_for_{{$field['name']}}_{{$option['value']}}() {
{{--                                                                                        @foreach($actions as $action)--}}
                                                                                        @foreach($actions as $_action)
                                                                                        @foreach($_action as $action)
{{--                                                                                        @if($action['select']==$field['name'])--}}
                                                                                        @if($action['select']==$select['field'])
{{--                                                                                        @if($action['option']!=$option['value'])--}}
                                                                                        //document.getElementById('{{$action['id']}}').style.display = "none";
                                                                                        var es = document.getElementsByClassName('{{$action['id']}}');
//foreach(es as e)
                                                                                        for(let i=0;i<es.length;i++)
                                                                                        {
                                                                                            es[i].style.display = 'none';
                                                                                        }
{{--                                                                                        @endif--}}
                                                                                        @endif
                                                                                        @endforeach
                                                                                        @endforeach
                                                                                    }
                                                                                    function show_for_{{$field['name']}}_{{$option['value']}}() {
                                                                                        {{--document.getElementById('{{$action['id']}}').style.display = "show";--}}
                                                                                        @foreach($actions as $_action)
                                                                                        @foreach($_action as $action)
                                                                                        @if($action['select']==$select['field'])
                                                                                        @if($action['option']==$option['value'])
                                                                                        var es = document.getElementsByClassName('{{$action['id']}}');
//foreach(es as e)
                                                                                        for(let i=0;i<es.length;i++)
                                                                                        {
                                                                                            es[i].style.display = 'block';
                                                                                        }
                                                                                        //document.getElementById('{{$action['id']}}').style.display = "block";
                                                                                        @endif
                                                                                        @endif
                                                                                        @endforeach
                                                                                        @endforeach
                                                                                    }
                                                                                </script>
                                                                        @endforeach
{{--                                                                            @endisset--}}
                                                                        <script>
                                                                            function f_{{$field['name']}}(e) {
                                                                                //{{$select['field']}}1
{{--                                                                                @foreach($actions as $action)--}}

{{--                                                                                @foreach($actions as $_action)--}}
{{--                                                                                @foreach($_action as $action)--}}

{{--                                                                                @if($action['select']==$field['name'])--}}
                                                                                //{{$select['field']}}2

{{--                                                                                @if($action['select']==$select['field'])--}}

                                                                                @foreach($field['options'] as $option)
                                                                                {{--if(e.value=='{{$action['option']}}')--}}
                                                                                if(e.value=='{{$option['value']}}')
                                                                                {
                                                                                    {{--hide_for_{{$field['name']}}_{{$action['option']}}();--}}
                                                                                    {{--show_for_{{$field['name']}}_{{$action['option']}}();--}}
                                                                                    hide_for_{{$field['name']}}_{{$option['value']}}();
                                                                                    show_for_{{$field['name']}}_{{$option['value']}}();
                                                                                }
                                                                                @endforeach

{{--                                                                                @endif--}}
{{--                                                                                @endforeach--}}
{{--                                                                                @endforeach--}}

                                                                            }
                                                                        </script>
                                                                    </select>
{{----}}
                                                                    @include('alerts.feedback', ['field' => 'name'])
                                                                </div>
                                                            @else
                                                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                                                    <label class="form-control-label" for="input-{{$field['name']}}">
{{--                                                                                                                    <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
                                                                        {{$field['label']}}
                                                                        @if(isset($model['label']) && !empty($model['label']))
{{--                                                                            - --}}
                                                                            {{$model['label']}}
                                                                        @endif
                                                                    </label>
{{--                                                                    <input type="{{$field['type']}}" name="{{$field['name']}}" id="input-{{$field['name']}}" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}
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
{{----}}
                                                                    @include('alerts.feedback', ['field' => 'name'])
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        </div>
                                                        @endforeach
{{--                                                        @endforeach--}}

{{--                                                        <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">--}}
{{--                                                            <label class="form-control-label" for="input-name">--}}
{{--                                                                <i class="w3-xxlarge fa fa-user"></i>{{ __('Name') }}--}}
{{--                                                            </label>--}}
{{--                                                            <input type="text" name="name" id="input-name" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->name) }}" required autofocus>--}}

{{--                                                            @include('alerts.feedback', ['field' => 'name'])--}}
{{--                                                        </div>--}}
{{--                                                        <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">--}}
{{--                                                            <label class="form-control-label" for="input-email"><i class="w3-xxlarge fa fa-envelope-o"></i>{{ __('Email') }}</label>--}}
{{--                                                            <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required>--}}

{{--                                                            @include('alerts.feedback', ['field' => 'email'])--}}
{{--                                                        </div>--}}
{{--                                                        <div class="text-center">--}}
{{--                                                            <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>--}}
{{--                                                        </div>--}}
                                                    </div>
{{--                                                @if($fields[0]['tab']['name']!='null')--}}
                                                @if(count($tabs)!=1)
                                                </div>
                                                @endif
                                                @endforeach
{{--                                                @php--}}
{{--                                                }--}}
{{--                                                @endphp--}}
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-default mt-4">Salvar</button>
{{--                                                    <button type="submit" class="btn btn-default mt-4">{{ __('Save') }}</button>--}}
                                                </div>
{{--                                            @if($fields[0]['tab']['name']!='null')--}}
                                            @if(count($tabs)!=1)
                                            </div>
                                            @endif
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