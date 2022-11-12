@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">{{ __('Informacje o koncie:') }}</div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa użytkownika') }}</label>
                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control"
                                       value="{{ $user['username'] }}" disabled>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>
                                <div class="col-md-6">
                                    <input id="email" type="text" class="form-control"
                                           value="{{ $user['email'] }}" disabled>
                                </div>
                            </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header">{{ __('Aktualizacja hasła') }}</div>

                    <div class="card-body">
                        <form method="POST" action="/post-profile">
                            @csrf

                            <div class="row mb-3">
                                <label for="current_password" class="col-md-4 col-form-label text-md-end">{{ __('Aktualne hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="current_password" type="password" class="form-control
                                    @error('current_password') is-invalid @enderror"
                                           name="current_password" value="{{ old('current_password') }}"
                                           autocomplete="current_password" autofocus>

                                    @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Nowe hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password_confirmation" class="col-md-4 col-form-label text-md-end">{{ __('Powtórz nowe hasło') }}</label>

                                <div class="col-md-6">
                                    <input id="password_confirmation" type="password"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation" autocomplete="new-password">

                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Zapisz') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        @if ($error = Session::get('error'))
                            <div class="alert alert-danger alert-block">
                                <strong>{{ $error }}</strong>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
