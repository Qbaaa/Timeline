@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-block">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif

                    <div class="card-header">{{ __('Teorzenie nowego procesu') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/post-process">
                            @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nazwa') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_start" class="col-md-4 col-form-label text-md-end">{{ __('Data rozpoczęcia') }}</label>

                                <div class="col-md-6">
                                    <input id="date_start" type="date" class="form-control @error('date_start') is-invalid @enderror"
                                           name="date_start" value="{{ old('date_start') }}" autocomplete="date_start">

                                    @error('date_start')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="date_end" class="col-md-4 col-form-label text-md-end">{{ __('Data zakończenia') }}</label>

                                <div class="col-md-6">
                                    <input id="date_end" type="date" class="form-control @error('date_end') is-invalid @enderror"
                                           name="date_end" value="{{ old('date_end') }}" autocomplete="date_end">

                                    @error('date_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="short_description" class="col-md-4 col-form-label text-md-end">{{ __('Krótki opis') }}</label>

                                <div class="col-md-6">
                                    <input id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror"
                                           name="short_description" value="{{ old('short_description') }}" autocomplete="short_description">
                                    @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="detailed_description" class="col-md-4 col-form-label text-md-end">{{ __('Szczegółowy opis') }}</label>

                                <div class="col-md-6">
                                    <textarea id="detailed_description" cols="40" rows="5"  class="form-control @error('detailed_description') is-invalid @enderror"
                                              name="detailed_description" autocomplete="detailed_description">{{ old('detailed_description') }}</textarea>

                                    @error('detailed_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="file_image" class="col-md-4 col-form-label text-md-end">{{ __('Ilustracja graficzna') }}</label>

                                <div class="col-md-6">
                                    <input id="file_image" type="file" class="form-control @error('file_image') is-invalid @enderror"
                                           name="file_image" autocomplete="file_image">

                                    @error('file_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Stwórz') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
