@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                <h1 class="h2">Edytuj typ</h1>
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

            <form action="/types/{{ $type->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nazwa</label>
                    <input class="form-control" id="name" type="text" value="{{ $type->name }}" name="name">
                </div>
                <div class="form-group">
                    <label for="color">Kolor</label>
                    <input class="form-control" id="color" type="color" value="{{ $type->color }}" name="color">
                </div>
                <button type="submit" class="btn btn-primary">Aktualizuj</button>
            </form>

        </div></div>
@endsection
