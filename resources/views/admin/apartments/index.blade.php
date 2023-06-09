@extends('layouts.admin')
@section('title')
Apartments
@endsection
@section('conatent')
<div class="col-12 col-md-12 col-lg-12">
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
            <h4>Apartments table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.apartments.create') }}" class="btn btn-primary">Create</a>
            </div>

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Nommi</th>
                            <th>Xona Soni</th>
                            <th>Maydon</th>
                            <th>Cars</th>
                            <th>Action</th>
                        </tr>
                        @foreach ($apartments as $apartment)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $apartment->nom}}</td>
                            <td>{{ $apartment->xona_soni}}</td>
                            <td>{{ $apartment->maydon}}</td>
                            <td>@foreach ($apartment->tags as $tag)
                                {{ $tag->model }}
                                {{ $tag->numbr }}
                                @endforeach
                            </td>
                            <td>
                                <form style="display: inline"
                                    action="{{ route('admin.apartments.destroy',$apartment->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger"
                                        onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                                <a href="{{ route('admin.apartments.edit',$apartment->id) }}"
                                    class="btn btn-success">Edit</a>

                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer text-right">
            <nav class="d-inline-block">

                {{-- <ul class="pagination mb-0">
                      <li class="page-item disabled">
                        <a class="page-link" href="#" tabindex="-1"><i class="fas fa-chevron-left"></i></a>
                      </li>
                      <li class="page-item active"><a class="page-link" href="#">1 <span class="sr-only">(current)</span></a></li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item"><a class="page-link" href="#">3</a></li>
                      <li class="page-item">
                        <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                      </li>
                    </ul> --}}
            </nav>
        </div>
    </div>
</div>
@endsection