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
Apartment Create
@endsection
@section('conatent')
<div class="col-12 col-md-12 col-lg-8">
    <form action="{{ route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Create Apartments</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Nommi</label>
                    <input type="text" value="{{old('nom')}}" required class="form-control" name="nom" @error('nom')
                        is-invalid @enderror>
                    @error('nom')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('nom')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Xona_soni</label>
                    <input type="text" value="{{old('xona_soni')}}" required class="form-control" name="xona_soni">
                    @error('xona_soni')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Maydon</label>
                    <input type="text" value="{{old('maydon')}}" required class="form-control" name="maydon">
                    @error('maydon')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Cars selected </label>
                    <select name="tags[]" value="{{old('tags[]')}}" required class="form-control select2" multiple>
                        @foreach ($tags as $tag)
                        <option value="{{$tag->id}}">{{ $tag->model}}</option>

                        @endforeach

                        {{-- select2 --}}
                    </select>
                    @error('tags[]')
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