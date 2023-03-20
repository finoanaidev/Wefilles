@extends('layouts.blank')

@section('content')
<section>
    <div class="row">
        @foreach ($offres as $offre)
        <div class="col-md-4">
                <!-- Début card -->
                <div class="card">
                    <img class="emploie-img card-img-top" src="{{asset('storage/'.$offre->image) }}" alt="Image de l'offre d'emploi" width="250px" height="200px">
                    <div class="card-body">
                        <h5 class="card-title">{{$offre->titre}}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{$offre->user->name}}</h6>
                        <p class="card-text">{{$offre->description}}</p>
                        <div class="contact card-text">Pour plus d'informaion, contactez
                            <div class="email"><small class="text-muted">{{$offre->user->email}}</small></div>
                            <div class="phone"><small class="text-muted">{{$offre->user->entreprise->numero}}</small></div>
                        </div>
                    </div>
                </div>
                <!-- Fin card -->
            </div>
        @endforeach 
    </div>
</section>
@endsection