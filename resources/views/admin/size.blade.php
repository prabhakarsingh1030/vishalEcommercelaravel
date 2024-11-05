@extends('admin.layouts.main')
@section('main-content')
    <!-- HEADER DESKTOP-->

    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div>
                    @if (session('message'))
                        <span class="alert alert-info">
                            {{ session('message') }}
                        </span>
                    @endif
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <a href="{{url('admin/size/manage_size')}}" class="btn btn-primary mb-1">Add Size</a>
                        <div class="table-responsive table--no-card m-b-40">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>size</th>
                                        <th>Status</th>
                                        <th>
                                            ACTION
                                        </th>


                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $value)
                                        <tr>
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->size }}</td>
                                            
                                            <td>

                                                @if($value->status == 1)

                                                <a href="{{ url('admin/size/status/0') }}/{{$value->id}}">
                                                    <button class="btn btn-success">Active</button>
                                                </a>
                                                @else
                                                <a href="{{ url('admin/size/status/1') }}/{{$value->id}}">
                                                    <button class="btn btn-primary">Deactive</button>
                                                </a>

                                                @endif

                                            </td><td>



                                                <a href="{{ url('admin/size/manage_size') }}/{{$value->id}}">
                                                    <button class="btn btn-primary">Edit</button>
                                                </a>
                                                <a href="{{ route('size.delete', ['id' => $value->id]) }}">
                                                    <button class="btn btn-danger">Delete</button>
                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            @endsection()
