@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Edytuj zdarzenie</h1>
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

            <form action="/events/{{ $event->id }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nazwa</label>
            <input class="form-control" id="name" type="text" value="{{ $event->name }}" name="name">
        </div>
        <div class="form-group">
            <label for="date">Data zaistnienia</label>
            <input class="form-control" id="date" type="date" value="{{ $event->date }}" name="date">
        </div>
        <div class="form-group">
            <label for="short_description">Krótki opis</label>
            <input class="form-control" id="short_description" type="text" value="{{ $event->short_description }}" name="short_description">
        </div>
        <div class="form-group">
            <label for="detailed_description">Szczegółowy opis</label>
            <textarea class="form-control" cols="40" rows="5" id="detailed_description" name="detailed_description">{{ __($event->detailed_description) }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="file_image">Ilustracja graficzna</label>
            <br>
            <img src="/images/{{ $event->file_image }}" width="200" height="150" alt="{{ $event->name }}">
            <input id="file_image" type="file" class="form-control" name="file_image">
        </div>

        <div class="form-group">
            <label for="type_id" >{{ __('Typ') }}</label>
            <select id="type_id" class="form-control" name="type_id" autocomplete="type_id">
                <option value="">Wybierz typ</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}"
                                @if ($type->id  == $event->type_id)
                                    selected="selected"
                            @endif
                        >{{ $type->name }}</option>
                    @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Aktualizuj</button>
    </form>

        </div></div>
@endsection
