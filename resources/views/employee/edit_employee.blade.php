@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Edit Employee') }}</div>

                    <div class="card-body">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <span>
                                    <a href="{{ route('employee.create') }}">
                                        {{ __('Create Employee') }}
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

                        @if(count(array($employee)) > 0)
                            <form method="POST" action="{{ route('employee.update', $employee->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" value="{{$employee->first_name}}" class="form-control @error('name') is-invalid @enderror" name="fname" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                        <input id="name" type="text" value="{{$employee->last_name}}" class="form-control @error('name') is-invalid @enderror" name="lname" value="{{ old('name') }}" required autocomplete="name" autofocus>

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

                                            @if(count($departments) > 0)
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}"> {{ $department->department_name }} </option>
                                                @endforeach
                                            @else
                                                <option>No Department</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" value="{{$employee->email}}" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                        <input id="phone" type="text" value="{{$employee->phone}}" class="form-control @error('phone') is-invalid @enderror" name="phone" required>

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
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <p class="mt-5 mb-5">No Results</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
