@extends('layouts.master')

@section('title', 'dashboard')

@section('content')
    <div>
        <h1>Meus Eventos</h1>
    </div>
    <div>
        @if(count($events)>0)
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Participantes</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td><a href="{{ route('show', $event->id) }}">{{ $event->title }}</a></td>
                        <td>{{ count($event->users) }}</td>
                        <td>
                            <a href="{{ route('edit', $event->id) }}">Editar</a>
                            <form action="{{ route('destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Deletar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        @else
            <h1>Você ainda não tem eventos, <a href="{{ route('create') }}">Criar Evento</a></h1>
        @endif
    </div>
    <div>
        <h1>Eventos que estou participando</h1>
    </div>
    <div>
        @if(count($eventsAsParticipant) > 0)
        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Participantes</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($eventsAsParticipant as $event)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td><a href="{{ route('show', $event->id) }}">{{ $event->title }}</a></td>
                    <td>{{ count($event->users) }}</td>
                    <td>
                        <form action="{{ route('leave', $event->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger delete-btn">
                                <ion-icon name="trash-outline"></ion-icon>Sair do Evento
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @else
        <p>Você ainda não está participando de nenhum evento, <a href="{{ route('index') }}">Veja todos os eventos</a></p>
        @endif
    </div>

@endsection
