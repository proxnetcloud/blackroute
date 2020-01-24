@extends('layouts.app', ['activePage' => 'upgrade', 'title' => 'Light Bootstrap Dashboard Laravel by Creative Tim & UPDIVISION', 'navName' => 'Upgrade', 'activeButton' => 'laravel'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 ml-auto mr-auto">
                            <div class="card">
                                <div class="header text-center">
                                    <h4 class="title">Light Bootstrap Dashboard</h4>
                                    <p class="category">Are you looking for more components? Please check our Premium Version of Light Bootstrap Dashboard.</p>
                                    <br>
                                </div>
                                <div class="content table-responsive table-upgrade">
                                    <table class="table">
                                        <thead>
                                            <th></th>
                                            <th class="text-center">Free</th>
                                            <th class="text-center">PRO</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Components</td>
                                                <td>16</td>
                                                <td>115+</td>
                                            </tr>
                                            <tr>
                                                <td>Plugins</td>
                                                <td>4</td>
                                                <td>14+</td>
                                            </tr>
                                            <tr>
                                                <td>Example Pages</td>
                                                <td>4</td>
                                                <td>22+</td>
                                            </tr>
                                            <tr>
                                                <td>Documentation</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td>SASS Files</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td>Login/Register/Lock Pages</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td>Premium Support</td>
                                                <td><i class="fa fa-times text-danger"></i></td>
                                                                    <td><i class="fa fa-check text-success"></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>Free</td>
                                                <td>Just $149</td>
                                            </tr>
                                            <tr class="last-row">
                                                <td></td>
                                                <td>
                                                    <a href="#" class="btn btn-round btn-fill btn-default disabled">Current Version</a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href=" https://www.creative-tim.com/product/light-bootstrap-dashboard-pro-laravel" class="btn btn-round btn-fill btn-info">Upgrade to PRO</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection