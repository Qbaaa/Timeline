@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Zdarzenia</h1>

        <div class="btn-toolbar mb-2 mb-md-0 non-print">
            <div class="btn-group mr-2">
                    <a class="btn btn-sm btn-outline-secondary" href="/event">Nowe zdarzenie</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th>Lp</th>
                <th>Nazwa</th>
                <th>Data</th>
                <th>Krótki opis</th>
                <th class=" non-print">Akcje</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->id}}</td>
                    <td>{{ $event->name }}</td>
                    <td>{{ $event->date }}</td>
                    <td>{{ $event->short_description }}</td>

                    <td class=" non-print">
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">

                                <button type="button" title="detail" class="btn btn-sm btn-info"
                                        data-toggle="modal" data-target="#detailModal_{{ $event->id }}">Szczegóły</button>

                                <!-- Modal -->
                                <div class="modal fade" id="detailModal_{{ $event->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="detailModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="detailModalLabel">Szczegóły zdarzenia o id {{ $event->id }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="detailed_description">Szczegółowy opis</label>
                                                        <textarea class="form-control" cols="40" rows="5" id="detailed_description"
                                                                  name="detailed_description" disabled>{{ __($event->detailed_description) }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="file_image">Ilustracja graficzna</label>
                                                        <br>
                                                        <img src="/images/{{ $event->file_image }}" width="200" height="150" alt="{{ $event->name }}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="type">Typ</label>
                                                        <input class="form-control" id="type" type="text" value="{{ $event->type->name }}" name="type" disabled>
                                                    </div>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                            <a href="events/{{ $event->id }}" class="btn btn-sm btn-warning">Edytuj</a>
                                <button type="button" title="delete" class="btn btn-sm btn-danger"
                                        data-toggle="modal" data-target="#deleteModal_{{ $event->id }}">Skasuj</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="deleteModal_{{ $event->id }}" tabindex="-1" role="dialog"
                                         aria-labelledby="deleteModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel">Kasowanie zdarzenia o id {{ $event->id }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Czy napewno chcesz usunąć zdarzenie?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                                    <form action="/events/remove/{{ $event->id }}" method="POST">@csrf @method('DELETE')
                                                        <button type="submit" title="delete" class="btn btn-danger" >Skasuj zdarzenie</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div></div></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
        </div>
    </div>
@endsection
