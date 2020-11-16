@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Employee') }}</div>

                    <div class="card-body">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <span>
                                    <a href="{{ route('employee.create') }}">
                                        {{ __('Refresh') }}
                                    </a>
                                </span>
                                    &nbsp;&nbsp;&nbsp;
                                    <span>
                                    <a href="{{ route('employees.list') }}">
                                        {{ __('View Employees') }}
                                    </a>
                                </span>
                            </div>
                        </div>
                        <hr>

                        <!-- for success or failure message -->
                        @include('alerts.messages')

{{--                        @if(count($departments) > 0)--}}
{{--                            @foreach ($departments as $department)--}}
{{--                                <option value="{{ $department->id }}"> {{ $department->department_name }} </option>--}}
{{--                            @endforeach--}}
{{--                        @else--}}
{{--                            <option>No Department</option>--}}
{{--                        @endif--}}

                        @if(count($departments) > 0)
                            <form method="POST" action="{{ route('employee.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Select Department') }}</label>

                                    <div class="col-md-6">
                                        <select class="form-control" name="did">
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"> {{ $department->department_name }} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <center>
                                <p>Please First Add Departments</p>
                            </center>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
