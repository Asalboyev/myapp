@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="/admin/assets/css/app.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/select2/dist/css/select2.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/admin/assets/img/favicon.ico' />@endsection

@section('title')
    Car  Create
@endsection
@section('conatent')
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
            @if (session('success'))
                <div class="alert alert-primary alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>×</span>
                        </button>
                        {{ session('success') }}
                    </div>
                </div>
            @endif
            <div class="card-header">
                <div class="card-header-form">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
            </div>




                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            @foreach ($clents as $clen)

                                <tr>
                                    <th>Name</th> <td>{{$clen->name}}</td>

                                </tr>
                                <tr>
                                    <th>Email</th> <td>{{$clen->email}}</td>
                                </tr>
                                <tr>
                                    <th>Tel</th> <a href="{{$clen->tel}}" > <td>{{$clen->tel}}</td></a>
                                </tr>
                            @endforeach
                            <tr>
                                <th>Apartment nom </th> <td>{{$appart->nom}}</td>
                            </tr>


                            <tr>
                                <th>Apartment maydon </th> <td>{{$appart->maydon}}</td>
                            </tr>
                            <tr>
                                <th>Apartment maydon</th> <td>{{$appart->xona_soni}}</td>
                            </tr>
                            <tr>
                                <th>Car model</th> <td>{{ $clen->cars_id}}</td>
                            </tr>





                        </table>
                    </div>
                </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">

            </nav>
        </div>
    </div>
@endsection
@section('js')
    <script src="/admin/assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <script src="/admin/assets/bundles/cleave-js/dist/cleave.min.js"></script>
    <script src="/admin/assets/bundles/cleave-js/dist/addons/cleave-phone.us.js"></script>
    <script src="/admin/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script src="/admin/assets/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
    <script src="/admin/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <script src="/admin/assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <script src="/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="/admin/assets/js/page/forms-advanced-forms.js"></script>
    <!-- Template JS File -->
    <script src="/admin/assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="/admin/assets/js/custom.js"></script>

@endsection
