@extends('admin.layouts-login-reg.main')
@section('title', __(config('app.name') . ' - Register'))

@section('content')
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <form class="user" method="POST" action="{{ route('create-admin') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-lg-5">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ __('Create Profile') }}</h1>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-4">
                                    @foreach (arrayGender() as $k => $g)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender"
                                                value="{{ $k }}" required>
                                            <label class="form-check-label" for="male">{{ __($g) }}</label>
                                        </div>
                                    @endforeach
                                    @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text"
                                        class="form-control form-control-user @error('fullname') is-invalid @enderror"
                                        placeholder="Full Name" name="fullname" value="{{ old('fullname') }}" required
                                        autofocus>
                                    @error('fullname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text"
                                        class="form-control form-control-user @error('phone') is-invalid @enderror"
                                        placeholder="Phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="file" class="custom-file-input form-control form-control-user" lang="es"
                                    name="avatar">
                                <label class="custom-file-label">{{ __('Avatar') }}</label>
                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input id="birthday" type="text"
                                        class="datepicker form-control form-control-user @error('birthday') is-invalid @enderror"
                                        name="birthday" placeholder="Birthday" value="{{ old('birthday') }}" required>
                                    @error('birthday')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <textarea class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Address" name="address" value="{{ old('address') }}"
                                        required>{{ old('address') }}</textarea>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{ __('Create an Account!') }}</h1>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-12 mb-3 mb-sm-0">
                                    <input type="text"
                                        class="form-control form-control-user @error('name') is-invalid @enderror"
                                        placeholder="Name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control form-control-user"
                                    placeholder="Email Address">
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Password">
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" name="password_confirmation"
                                        class="form-control form-control-user" placeholder="Repeat Password">
                                </div>
                            </div>
                            <button type="submit"
                                class="btn btn-primary btn-user btn-block">{{ __('Register Account') }}</button>
                            <hr>
                            <div class="text-center">
                                <a class="small"
                                    href="{{ route('admin.password.reset') }}">{{ __('Forgot Password?') }}</a>
                            </div>
                            <div class="text-center">
                                <a class="small"
                                    href="{{ route('admin-login') }}">{{ __('Already have an account? Login!') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@include('helper.datetimepicker')
