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
Clents Create
@endsection

@section('conatent')
<div class="col-12 col-md-12 col-lg-8">
    <form action="{{ route('admin.clents.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h4>Create Clent</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{old('name')}}" required class="form-control" name="name" @error('name')
                        is-invalid @enderror>
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('name')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" value="{{old('email')}}" required class="form-control" name="email">
                    @error('email')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel" value="{{old('tel')}}" required class="form-control" name="tel">
                    @error('tel')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Apartments selected </label>
                    <select class="form-control" value="{{old('apartments_id')}}" required name="apartments_id"
                        id="apartments_id">
                        <option value="" selected="false" disabled="disabled">choose an apartments </option>

                        @foreach ($apartments as $apartment )
                        <option value="{{$apartment->id}}">{{ $apartment->nom}}</option>
                        @endforeach
                    </select>
                    @error('apartments_id')
                    <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Cars selected </label>
                    <select redirect required name="cars[]" class="form-control select2" multiple  value="{{old('cars_id')}}"  
                        id="cars_id">
                    </select>

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
<script type="text/javascript">
$(document).ready(function() {
    $("#apartments_id").change(function() {
        var regionCode = this.value;
        $('#cars_id').html('');
        $.ajax({
            url: '{{ route('admin.getDistrict') }}?id=' + regionCode,
            type: 'get',
            dataType: 'json',
            success: function(res) {
                $('#cars_id').html(
                    // '<option value="" selected="false" disabled="disabled">Cars select</option>'
                );

                $.each(res, function(key, value) {
                    $('#cars_id').append('<option value="'  + value.id +
                        '">' +
                        value.model + '</option>');
                });
            }


        });
    });
});
</script>


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
