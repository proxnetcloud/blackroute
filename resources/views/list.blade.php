@extends('layouts.app', ['activePage' => $activePage, 'activeButton' => $activeButton, 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Users'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card data-tables">

                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('Users') }}</h3>
                                    <p class="text-sm mb-0">
                                        {{ __('This is an example of user management. This is a minimal setup in order to get started fast.') }}
                                    </p>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-default">{{ __('Add user') }}</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            @include('alerts.success')
                            @include('alerts.errors')
                        </div>

                        <div class="toolbar">
                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                        </div>
                        <div class="card-body table-full-width table-responsive">
                            <div style="margin-left: 8px">{{$links->links()}}</div>
                            <table class="table table-hover table-striped">
                                @php
                                    $columns_ = '';
                                    foreach ($columns as $column)
                                    {
                                        $columns_ .= '<th>'.$column.'</th>';
                                    }
                                @endphp
                                <thead>
                                    @php echo $columns_; @endphp
{{--                                    {{$columns_}}--}}
{{--                                    @foreach($columns as $column)--}}
{{--                                        <th>{{$column}}</th>--}}
{{--                                    @endforeach--}}
{{--                                <th>{{ __('Name') }}</th>--}}
{{--                                <th>{{ __('Email') }}</th>--}}
{{--                                <th>{{ __('Start') }}</th>--}}
{{--                                <th>{{ __('Actions') }}</th>--}}
                                </thead>
                                <tfoot>
                                <tr>
                                    @php echo $columns_; @endphp
{{--                                    @foreach($columns as $column)--}}
{{--                                        <th>{{$column}}</th>--}}
{{--                                    @endforeach--}}
{{--                                    {{$columns_}}--}}
{{--                                    <th>{{ __('Name') }}</th>--}}
{{--                                    <th>{{ __('Email') }}</th>--}}
{{--                                    <th>{{ __('Start') }}</th>--}}
{{--                                    <th>{{ __('Actions') }}</th>--}}
                                </tr>
                                </tfoot>
                                <tbody>

                                @foreach ($lines as $line)
                                    <tr>
                                        @php
                                            $i = -1;
                                        @endphp
                                        @foreach($line as $columns__)
                                            @php
                                                $i++;
                                            @endphp
{{--                                            <td>{{$column}}</td>--}}
                                            <td>{{$columns__}}</td>
{{--                                            @foreach($columns as $column)--}}
{{--                                            <td>--}}
{{--                                                @php--}}
{{--                                                    try{--}}
{{--                                                      //echo $columns__['Nome'];--}}
{{--                                                      echo $columns__[$column];--}}
{{--                                                      }catch (Exception $e)--}}
{{--                                                {--}}
{{----}}
{{--                                                    throw new \Exception(--}}
{{--                                                        json_encode($columns__).'|'.$column--}}
{{--                                                      );--}}
{{--                                                }--}}
{{--                                                @endphp--}}
{{--                                            </td>--}}
{{--                                            @endforeach--}}
                                        @endforeach
{{--                                        <td>{{ $user->name }}</td>--}}
{{--                                        <td>{{ $user->email }}</td>--}}
{{--                                        <td>{{ $user->created_at }}</td>--}}
                                        <td class="d-flex justify-content-end">
                                                @foreach($buttons[$i] as $button)
{{--                                                    {{$button['type']}}--}}
{{--                                            @if ($user->id != auth()->id())--}}]
                                                @if($button['finality'] == 'edit' and $button['type']=='link')
{{--                                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>--}}
                                                <a href="{{ route($button['route']['route'], $button['route']['params']) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>
                                                @endif
                                                @if($button['finality'] == 'delete' and $button['type']=='form')
{{--                                                <form class="d-inline-block" action="{{ route($button['route']['route'], $user->id) }}" method="POST">--}}
                                                <form class="d-inline-block" action="{{ route($button['route']['route'], $button['route']['params']) }}" method="POST">
                                                    @method('delete')
                                                    @csrf
{{--                                                    <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''"s><i class="fa fa-times"></i></a>--}}
                                                    <a class="btn btn-link btn-danger " onclick="confirm('{{ __('Tem certeza que deseja cancelar ?') }}') ? this.parentElement.submit() : ''"><i class="fa fa-times"></i></a>
                                                </form>
                                                @endif
{{--                                            @else--}}
{{--                                                <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-link btn-warning edit d-inline-block"><i class="fa fa-edit"></i></a>--}}
{{--                                            @endif--}}
                                                @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div style="margin-left: 8px">{{$links->links()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
{{--    <script type="text/javascript">--}}
{{--        $(document).ready(function() {--}}
{{--            $('#datatables').DataTable({--}}
{{--                "pagingType": "full_numbers",--}}
{{--                "lengthMenu": [--}}
{{--                    [10, 25, 50, -1],--}}
{{--                    [10, 25, 50, "All"]--}}
{{--                ],--}}
{{--                responsive: true,--}}
{{--                language: {--}}
{{--                    search: "_INPUT_",--}}
{{--                    searchPlaceholder: "Search records",--}}
{{--                }--}}

{{--            });--}}


{{--            var table = $('#datatables').DataTable();--}}

{{--            // Delete a record--}}
{{--            table.on('click', '.remove', function(e) {--}}
{{--                $tr = $(this).closest('tr');--}}
{{--                table.row($tr).remove().draw();--}}
{{--                e.preventDefault();--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}
@endpush