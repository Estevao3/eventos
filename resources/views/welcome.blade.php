@extends('layouts.master')

@section('title', 'Events')

@section('content')

    <div id="search-container" class="col-md-12">
        <form action="{{ route('index') }}">
            <input type="text" id="search" name="search" clall="form-control" placeholder="Procurar...">
        </form>
    </div>
    <div id="events-container" class="col-md-12">
        @if($search)
        <h2>Buscando por: {{ $search }}</h2>
        @else
        <h2>Próximos Eventos</h2>
        <p>Veja os eventos dos próximos dias</p>
        @endif
        <div id="cards-container" class="row">
            @foreach($events as $event)
            <div class="card col-md-3">
                <a href="{{ route('show', $event->id) }}"><img src="img/events/{{ $event->image }}" alt="{{ $event->title }}"></a>
                <div class="card-body">
                    <p class="card-date">{{ date('d/m/y', strtotime($event->date)) }}</p>
                    <a href="{{ route('show', $event->id) }}" ><h5 class="card-title">{{ $event->title }}</h5><a/>
                    <p class="card-participants">x Participantes</p>
                    <a href="{{ route('show', $event->id) }}" class="btn btn-primary">Saber mais</a>
                </div>
            </div>
                @if(($loop->index + 1) % 4 === 0)
                    <div style="width: 100%; float: left; height: 1px;"></div>
                @endif
            @endforeach
            @if(count($events) == 0 && $search)
                <p>Não foi possível encontrar nenhum evento com "{{ $search }}" <a href="{{ route('index') }}">Ver todos</a></p>
            @elseif(count($events) == 0)
                <p>Não Há Eventos Disponíveis</p>
            @endif
        </div>
    </div>

@endsection
