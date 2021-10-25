@extends('layouts.master')

@section('title', $event->title)

@section('content')
     <div class="col-md-10 offset-md-1">
         <div class="row">
             <div id="image-container" class="col-md-6">
                 <img src="img/events/{{ $event->image }}" class="img-fluid" alt="{{ $event->title }}">
             </div>
             <div id="info-container" class="col-md-6">
                 <h1>{{ $event->title }}</h1>

                 <p class="event-city"><ion-icon name="location-outline"></ion-icon>{{ $event->city }}</p>
                 <p class="events-participants"><icon-icon name="people-outline"></icon-icon>
                    {{ count($event->users) }} Participantes</p>
                 <p class="event-owner"><ion-icon name="star-outline"></ion-icon>Dono do Evento: {{ $eventOwner['name'] }}</p>
                 @if(!$hasUserJoined)
                 <form action="{{ route('joinEvent', $event->id) }}" method="post">
                     @csrf
                     <a href="{{ route('joinEvent', $event->id) }}"
                        class="btn btn-primary"
                        id="event-submit"
                        onclick="event.preventDefault();
                    this.closest('form').submit();">
                         Confirmar Presença</a>
                 </form>
                 @else
                 <p>Você ja esta participando desse evento</p>
                 @endif
                 <h3>O evento conta com:</h3>
                 <ul id="item-list">
                 @foreach($event->items as $item)
                     <li><span>{{ $item }}</span></li>
                 @endforeach
                 </ul>
             </div>
             <div class="col-md-12" id="description-container">
                 <h3>Sobre o Evento:</h3>
                 <p class="event-description">{{ $event->description }}</p>
             </div>
         </div>
     </div>
@endsection
