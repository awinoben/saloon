@extends('users.default')
@section('content')
    @include('users.header')
    <div class="container">
        <div class="container-fluid">
            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-7">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Editing Staff Information</h6>
                            <div class="pull-right">
                                <a class="btn btn-info" href="{{ route('employees.index') }}"> Back</a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('employees.update',$employee->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Name:</strong>
                                                <input type="text" name="name" value="{{ $employee->name }}" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Phone Number:</strong>
                                                <input type="number" name="phone_number" value="{{ $employee->phone_number }}" class="form-control" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-outline-success"><i class="fa fa-arrow-circle-up"></i>Update</button>
                                        </div>
                                    </div>

                                </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
    </div>
@endsection