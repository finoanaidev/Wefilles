@extends('layouts.blank')

@section('content')
<section class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div class="card card-style1 border-0">
                    <div class="card-body p-1-9 p-sm-2-3 p-md-6 p-lg-7">
                        <div class="row align-items-center">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <img class="img" src="{{asset('welcome')}}/image/photo.png" >
                                {{-- <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="..."> --}}
                            </div>
                            <div class="col-lg-6 px-xl-10">
                                <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                    <h3 class="h2 text-white mb-0">{{$entreprise->user->name}}</h3>
                                    <span class="text-primary">Domaine: {{$entreprise->domaine}}</span>
                                </div>
                                <br><br>
                                <ul class="list-unstyled mb-1-9">
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> {{$entreprise->user->email}}</li>
                                    <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.example.com</li>
                                    <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span>{{$entreprise->numero}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-4 mb-sm-5">
                <div>
                    <h4><span class="section-title text-primary mb-3 mb-sm-4">A propos</span></h4>
                    <p>{{$entreprise->apropos}}</p>
                    <p class="mb-0">{{$entreprise->description}}</p>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="row">
                    @if (!is_null($entreprise->user->offres))
                        @foreach ($entreprise->user->offres as $offre)
                            @if ($offre->isDispo)
                            <div class="col-lg-4 mt-4 mt-lg-0 aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                                <div class="d-flex align-items-start">
                                    <div class="card">
                                        <img class="emploie-img card-img-top" src="{{asset('storage/'.$offre->image) }}" alt="Image de l'offre d'emploi">
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
                                </div>
                            </div>
                            @endif
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection