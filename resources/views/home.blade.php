@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                        <hr>

                        <br>
                        <center>
                            <div class="container">
                                <a href="{{ route('departments.list') }}">
                                    <button class="btn btn-outline-primary" style="width:180px; height:180px; display:inline-block">
                                        <span>{{ $department }}</span>
                                        <br>
                                        <span>Departments</span>
                                    </button>
                                </a>

                                &nbsp;&nbsp;&nbsp;&nbsp;

                                <a href="{{ route('employees.list') }}">
                                    <button class="btn btn-outline-secondary" style="width:180px; height:180px;">
                                        <span>{{ $employee }}</span>
                                        <br>
                                        <span>Employees</span>
                                    </button>
                                </a>

                            </div>
                        </center>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
