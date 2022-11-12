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

                    <div class="card-header">{{ __('Teorzenie nowego zdarzenia') }}</div>

                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="/post-event">
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
                                <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Data zaistnienia') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                                           name="date" value="{{ old('date') }}" autocomplete="date">

                                    @error('date')
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
                                              name="detailed_description" autocomplete="detailed_description"></textarea>

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

                            <div class="row mb-3">
                                <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Typ') }}</label>

                                <div class="col-md-6">
                                    <select id="type" class="form-control @error('type') is-invalid @enderror"
                                            name="type" autocomplete="type">
                                        <option value="">Wybierz typ</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}"
                                                    @if ($type->id  == old('type'))
                                                        selected="selected"
                                                @endif
                                            >{{ $type->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('type')
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
