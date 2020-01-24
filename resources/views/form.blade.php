@php
    $show_menu = false;
@endphp
@extends('layouts.app', ['activePage' => 'register', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION'])
@php
    $activeButton = $navName = '';
@endphp
@section('content')
    <div class="full-page register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/bg5.jpg') }}">
{{--    <div class="full-page register-page" data-color="orange" data-image="{{ asset('light-bootstrap/img/bg5.jpg') }}">--}}
{{--    <div class="register-page section-image" data-color="orange" data-image="{{ asset('light-bootstrap/img/bg5.jpg') }}">--}}
{{--    <div class="full-page register-page section-image" data-color="orange">--}}
        <div class="content">
            <div class="container">
                <div class="card card-register card-plain text-center">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-circle-09"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Free Account') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-preferences-circle-rotate"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Awesome Performances') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                                <div class="media">
                                    <div class="media-left">
                                        <div class="icon">
                                            <i class="nc-icon nc-planet"></i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <h4>{{ __('Global Support') }}</h4>
                                        <p>{{ __('Here you can write a feature description for your dashboard, let the users know what is the value that you give them.') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 mr-auto">
{{--                            <div class="col-md-4 mr-auto" style="width: 50%!important;">--}}
                                <form method="POST" action="{{ route($route) }}">
                                    @csrf
                                    <div class="card card-plain">
                                        <div class="content">
                                            @foreach($fields as $field)
                                            @if($field['type'] == 'select')
                                            @else
                                            <div class="form-group">
                                                <input type="{{$field['type']}}" name="{{$field['name']}}" class="form-control" placeholder="{{$field['placeholder']}}" required>
                                            </div>
                                            @endif
                                            @endforeach

                                            <div class="footer text-center">
                                                <button type="submit" class="btn btn-fill btn-neutral btn-wd">Gravar/Salvar</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-warning alert-dismissible fade show" >
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close"> &times;</a>
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            demo.checkFullPageBackgroundImage();

            setTimeout(function() {
                // after 1000 ms we add the class animated to the login/register card
                $('.card').removeClass('card-hidden');
            }, 700)
        });
    </script>
@endpush