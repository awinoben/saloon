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
                            <h6 class="m-0 font-weight-bold text-primary">Staff List</h6><span class="float-right"><a class="btn btn-outline-success" href="{{ route('employees.create') }}">Add New</a></span>
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
                                        <th><i class="fa fa-user"></i></th>
                                        <th>Name</th>
                                        <th>Phone Number</th>
                                        <th width="280px">Action</th>
                                    </tr>
                                    @foreach ($employees as $employee)
                                        <tr>
                                            <td>{{ ++$i}}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->phone_number }}</td>
                                            <td>
                                                <form action="{{ route('employees.destroy',$employee->id) }}" method="POST">

                                                    <a class="btn btn-info" href="{{ route('employees.show',$employee->id) }}">Show</a>

                                                    <a class="btn btn-primary" href="{{ route('employees.edit',$employee->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>

                                {!! $employees->links() !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Row -->

        </div>
    </div>
@endsection