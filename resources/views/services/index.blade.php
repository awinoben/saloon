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
                            <h6 class="m-0 font-weight-bold text-primary">Services List</h6><span class="float-right"><a class="btn btn-outline-success" href="{{ route('services.create') }}">Add New</a></span>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="2%"><i class="fa fa-wrench"></i></th>
                                        <th width="20%">Service</th>
                                        <th width="3%">Commission</th>
                                        <th width="45%">Description</th>
                                        <th width="30%">Action</th>
                                    </tr>
                                    @foreach ($services as $service)
                                        <tr>
                                            <td>{{ ++$i}}</td>
                                            <td>{{ $service->name }}</td>
                                            <td>{{ $service->commission }}%</td>
                                            <td>{{ $service->description }}</td>
                                            <td>
                                                <form action="{{ route('services.destroy',$service->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('services.show',$service->id) }}">Show</a>

                                                    <a class="btn btn-primary" href="{{ route('services.edit',$service->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                {!! $services->links() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
    </div>
@endsection