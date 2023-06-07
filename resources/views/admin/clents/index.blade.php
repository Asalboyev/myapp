@extends('layouts.admin')
@section('title')
    Clents
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
                <h4>Clents table</h4>
                <div class="card-header-form">
                    <a href="{{ route('admin.clents.create') }}" class="btn btn-primary">Create</a>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-md">
                        <tbody><tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Apartments </th>
                            <th>Car </th>

                            <th>Action</th>
                        </tr>
                        @foreach ($clents as $clent)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $clent->name}}</td>
                                <td>{{ $clent->email}}</td>
                                <td>{{ $clent->tel}}</td>


                                <td>{{ $clent->apartments->nom ?? ''}} | {{ $clent->apartments->xona_soni ?? ''}} </td>
                                <td>{{ $clent->cars->model ?? ''}} | {{ $clent->cars->number ?? ''}} </td>


                                <td >
                                    <form style="display: inline" action="{{ route('admin.clents.destroy',$clent->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button href="#" class="btn btn-danger" onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                    </form>
                                    <a href="{{ route('admin.clents.edit',$clent->id) }}" class="btn btn-success">Edit</a>

                                </td>
                            </tr>
                        @endforeach


                        </tbody></table>
                </div>
            </div>

            <div class="card-footer text-right">
                <nav class="d-inline-block">


                </nav>
            </div>
        </div>
    </div>
@endsection
