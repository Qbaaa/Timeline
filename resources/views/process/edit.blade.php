@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Edytuj proces</h1>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-block">
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="/processes/{{ $process->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input class="form-control" id="name" type="text" value="{{ $process->name }}" name="name">
                </div>

                <div class="form-group">
                    <label for="date_start">Data rozpoczęcia</label>
                    <input class="form-control" id="date_start" type="date" value="{{ $process->date_start }}" name="date_start">
                </div>

                <div class="form-group">
                    <label for="date_end">Data zakończenia</label>
                    <input class="form-control" id="date_end" type="date" value="{{ $process->date_end }}" name="date_end">
                </div>

                <div class="form-group">
                    <label for="short_description">Krótki opis</label>
                    <input class="form-control" id="short_description" type="text" value="{{ $process->short_description }}" name="short_description">
                </div>

                <div class="form-group">
                    <label for="detailed_description">Szczegółowy opis</label>
                    <textarea class="form-control" cols="40" rows="5" id="detailed_description" name="detailed_description">{{ __($process->detailed_description) }}
            </textarea>
                </div>

                <div class="form-group">
                    <label for="file_image">Ilustracja graficzna</label>
                    <br>
                    <img src="/images/{{ $process->file_image }}" width="200" height="150" alt="{{ $process->name }}">
                    <input id="file_image" type="file" class="form-control" name="file_image">
                </div>

                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </form>

        </div>
    </div>
@endsection
