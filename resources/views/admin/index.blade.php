@extends('layouts.admin')
@section('title')
Clents_Car
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
            <h4>Clents Car table</h4>
            <div class="card-header-form">
                <a href="{{ route('admin.clents.create') }}" class="btn btn-primary">Create</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-md">
                    <tbody>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Tel</th>
                            <th>Phone</th>
                            <th>Car </th>

                            <th>Action</th>
                        </tr>
                        @foreach ($clent_cars as $clent_car)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ $clent_car->name}}</td>
                            <td>{{ $clent_car->tel}}</td>
                            <td>{!! $clent_car->message!!}</td>
                            <td>{{ $clent_car->cars->model ?? ''}} | {{ $clent_car->cars->number ?? ''}} </td>
                            <td>
                                <form style="display: inline"
                                    action="{{ route('admin.clentscar.destroy',$clent_car->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button href="#" class="btn btn-danger"
                                        onclick="return confirm('Ochirishni xohlisizmi?')" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--            <div class="card-footer text-right">--}}
        {{--                <nav class="d-inline-block">--}}


        {{--                </nav>--}}
        {{--            </div>--}}
    </div>
</div>
@endsection