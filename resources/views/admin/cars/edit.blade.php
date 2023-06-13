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
Apartment Edit
@endsection

@section('conatent')
<div class="col-12 col-md-12 col-lg-8">
    <form action=" {{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h4>Create Apartments</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Model</label>
                    <input type="text" value="{{$car->model}}" class="form-control" name="model" @error('model')
                        is-invalid @enderror>
                    @error('model')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Car Number</label>
                    <input type="text" value="{{$car->number}}" class="form-control" name="number">
                </div>
                <div class="form-group">
                    <label>Color</label>
                    <input type="text" value="{{$car->color}}" required class="form-control" name="color">
                    @error('color')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="number" value="{{$car->year}}" required class="form-control" name="year">
                    @error('year')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </div>
        </div>
    </form>
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