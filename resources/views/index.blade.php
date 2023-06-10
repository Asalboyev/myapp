
<!DOCTYPE html>
<html lang="en">


<!-- forms-editor.html  21 Nov 2019 03:55:08 GMT -->
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="/admin/assets/css/app.min.css">
    <link rel="stylesheet" href="/admin/assets/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="/admin/assets/bundles/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="/admin/assets/bundles/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="/admin/assets/bundles/jquery-selectric/selectric.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="/admin/assets/css/style.css">
    <link rel="stylesheet" href="/admin/assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="/admin/assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='/admin/assets/img/favicon.ico' />
</head>

<body>
<div class="loader"></div>
<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- Main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                                <span>×</span>
                                            </button>
                                            {{ session('success') }}
                                        </div>
                                    </div>
                                @endif
                                <div class="card-header">
                                    <h4>Add information</h4>
                                </div>
                                <form method="POST" action="{{ route('admin.clentscar.store') }}" class="needs-validation" novalidate="">
                                    @csrf
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" value="{{old('name')}}" required name="name" class="form-control">
                                            @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" value="{{old('tel')}}" required  name="tel" class="form-control">
                                                @error('tel')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Cars</label>
                                            <div class="col-sm-12 col-md-7">
                                                <select class="form-control" name="cars_id" value="{{old('cars_id')}}" required id="">

                                                    @foreach ($cars as $car )
                                                        <option value="{{$car->id}}">{{ $car->model}}</option>

                                                    @endforeach
                                                </select>
                                                @error('cars_id')
                                                <span style="color: red">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea name="message" value="{{old('message')}}" required class="summernote"></textarea>
                                            @error('message')
                                            <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Save</button>
                                        </div>
                                </div>
                            </div>
                                    <form>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<!-- General JS Scripts -->
<script src="/admin/assets/js/app.min.js"></script>
<!-- JS Libraies -->
<script src="/admin/assets/bundles/summernote/summernote-bs4.js"></script>
<script src="/admin/assets/bundles/codemirror/lib/codemirror.js"></script>
<script src="/admin/assets/bundles/codemirror/mode/javascript/javascript.js"></script>
<script src="/admin/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
<script src="/admin/assets/bundles/ckeditor/ckeditor.js"></script>
<!-- Page Specific JS File -->
<script src="/admin/assets/js/page/ckeditor.js"></script>
<!-- Template JS File -->
<script src="/admin/assets/js/scripts.js"></script>
<!-- Custom JS File -->
<script src="/admin/assets/js/custom.js"></script>
</body>


<!-- forms-editor.html  21 Nov 2019 03:55:16 GMT -->
</html>
