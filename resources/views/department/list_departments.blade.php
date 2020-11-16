@extends('layouts.app')

@include('patials.table_styles')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Departments') }}</div>
                <div class="card-body">

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-0">
                            <span>
                                <a href="{{ route('departments.list') }}">
                                    {{ __('Refresh') }}
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <span>
                                <a href="{{ route('department.create') }}">
                                    {{ __('Create Department') }}
                                </a>
                            </span>
                        </div>
                    </div>
                    <hr>

                    <!-- for success or failure message -->
                    @include('alerts.messages')

                    <center>

                        @if(count($departments) > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Department Name</th>
                                        <th scope="col">Department Email</th>
                                        <th scope="col">Department Phone</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($departments as $department)
                                        <tr>
                                            <td data-label="Account">{{ $department->department_name }}</td>
                                            <td data-label="Due Date">{{ $department->department_email }}</td>
                                            <td data-label="Amount">{{ $department->department_phone }}</td>
                                            <td data-label="Period">
{{--                                                {{ $department->id }}--}}
                                                <span>
                                                      <a class="btn btn-success btn-sm" href="{{route('department.show', ['id' => $department->id])}}">
                                                          View
                                                      </a>
                                                </span>

                                                <span>
                                                      <a class="btn btn-warning btn-sm" href="{{route('department.edit', ['id' => $department->id])}}">
                                                          Edit
                                                      </a>
                                                </span>

                                                <span>
                                                    <form action="{{route('department.delete', ['id' => $department->id])}}" method="post">
                                                        @csrf
                                                        {{@method_field('delete')}}
                                                        <button class="btn btn-danger btn-sm" title="Delete">Delete</button>
                                                    </form>
                                                </span>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <p>{{ $departments->links() }}</p>

                        @else
                            <p>No Results</p>
                        @endif

                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
