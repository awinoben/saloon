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
                            <h6 class="m-0 font-weight-bold text-primary">Service Details</h6>
                            <div class="pull-right">
                                <a class="btn btn-info" href="{{ route('services.index') }}"> Back</a>
                            </div>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Name:</strong>
                                            {{ $service->name }}
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Commission:</strong>
                                            {{ $service->commission }}%
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Description:</strong>
                                            {{ $service->description }}
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
    </div>
@endsection