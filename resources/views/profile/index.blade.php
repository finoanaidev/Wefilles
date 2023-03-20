@extends('layouts.blank')

@section('content')
    @if ($user->type == 'entreprise')
    <div class="jumbotron jumbotron-fluid">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ is_null($user->entreprise) ? '' : asset('storage/'.$user->entreprise->image) }}" class="img-fluid" alt="Photo de l'entreprise" style="
                                max-height: 300px;
                                border-radius: 20px;
                                box-shadow: 0 0 10px -4px black;
                            ">
                    </div>
                    <div class="col-md-6">
                        <h1 class="display-4">{{$user->name}}</h1>
                        <p class="lead">{{is_null($user->entreprise) ? '' : $user->entreprise->apropos}}</p>
                    </div>
                </div>
            </div>
    </div>

    <!-- Section d'informations de base -->
    <div class="row">
        <div class="col-md-4">
            <h2>Informations de base</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom :</strong> {{$user->name}}</li>
                <li class="list-group-item"><strong>Domaine :</strong> {{is_null($user->entreprise)? '' : $user->entreprise->domaine}}</li>
                <li class="list-group-item"><strong>Adresse :</strong> {{is_null($user->entreprise)? '' : $user->entreprise->address}}</li>
                <li class="list-group-item"><strong>Téléphone :</strong> {{is_null($user->entreprise)? '' : $user->entreprise->numero}}</li>
                <li class="list-group-item"><strong>Email :</strong> {{is_null($user->entreprise)? '' : $user->email}}</li>
            </ul>
        </div>
        <div class="col-md-8">
            <h2>Description de l'entreprise</h2>
            <p>{{is_null($user->entreprise)? '' : $user->entreprise->description}}</p>
        </div>
    </div>

    <!-- Section des employés -->
    <div class="container mt-5">
        <h2> offres d'emploi</h2>
        @if (!is_null($user->offres))
            @foreach ($user->offres as $offre)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">{{$offre->titre}}</h5>
                    <p class="card-text">{{$offre->description}}</p>
                </div>
                @if($offre->isDispo)
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <form action="{{route('offre.update', $offre->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info">Masquer</button>
                        </form>
                    </div>
                </div>
                @endif
                @if(!$offre->isDispo)
                <div class="card-footer">
                    <div class="d-flex justify-content-end">
                        <form action="{{route('offre.update', $offre->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" disabled class="btn btn-warning">Offre Indisponible</button>
                        </form>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
        @endif
    </div>

    <div class="row">
        <a href="{{route('offre.create')}}" class="btn btn-primary" style="
            margin: 0em 3em;
            width: 100%;
        ">
            Publier une offre d'emploi
        </a>
        <a href="{{route('profile.edit', Auth::user()->id)}}" class="btn btn-secondary" style="
            margin: 3em 3em;
            width: 100%;
        ">
            Modifier mon profile
        </a>
    </div>
    @else
    <div class="container-xl px-4 mt-4">
        <hr class="mt-0 mb-4">
        <form action="{{route('profile.update',  Auth::user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">Photo de profile</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2" src="{{ is_null($user->usernormal) ? '' : asset('storage/'.$user->usernormal->image)}}" alt=""
                            style="
                                width: 17.5em;
                                height: 17.5em;
                                border: 1px solid #999;
                                object-fit: cover;
                                object-position: center;
                            "
                        >
                        <!-- Profile picture help block-->
                        <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                        <!-- Profile picture upload button-->
                        <input type="file" class="btn btn-primary" type="button" name="image">
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">Details</div>
                    <div class="card-body">
                        
                            <!-- Form Group (username)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Nom</label>
                                <input class="form-control" id="inputUsername" name="name"type="text" placeholder="Enter your username" value="{{$user->name}}">
                            </div>
                            <!-- Form Row        -->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (organization name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputOrgName">Poste</label>
                                    <input class="form-control" id="inputOrgName"  name="poste" type="text" placeholder="Enter your organization name" value="{{is_null($user->usernormal) ? '' : $user->usernormal->poste}}">
                                </div>
                                <!-- Form Group (location)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputLocation">Address</label>
                                    <input class="form-control" id="inputLocation" name="address" type="text" placeholder="Enter your location" value="{{is_null($user->usernormal) ? '' : $user->usernormal->address}}">
                                </div>
                            </div>
                            <!-- Form Group (email address)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="inputEmailAddress">Email </label>
                                <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="{{$user->email}}">
                            </div>
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputPhone">Phone number</label>
                                    <input class="form-control" id="inputPhone" name="numero" type="tel" placeholder="Enter your phone number" value="{{is_null($user->usernormal) ? '' : $user->usernormal->numero}}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (phone number)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="nomGit">nom Git</label>
                                    <input class="form-control" id="nomGit" name="nomGit" type="text" placeholder="Enter your phone number" value="{{is_null($user->usernormal) ? '' : $user->usernormal->nomGit}}">
                                </div>
                                <!-- Form Group (phone number)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="nomLinkdIn">nom Linkd'In</label>
                                    <input class="form-control" id="nomLinkdIn" name="nomLinkdIn" type="text" placeholder="Enter your phone number" value="{{is_null($user->usernormal) ? '' :  $user->usernormal->nomLinkdIn}}">
                                </div>
                                <!-- Form Group (phone number)-->
                                <div class="col-md-3">
                                    <label class="small mb-1" for="nomFacebook">nom Facebook</label>
                                    <input class="form-control" id="nomFacebook" name="nomFacebook" type="text" placeholder="Enter your phone number" value="{{is_null($user->usernormal) ? '' : $user->usernormal->nomFacebook}}">
                                </div>
                                <div class="col-md-3">
                                    <label class="small mb-1" for="sexe">Sexe</label>
                                    <input class="form-control" id="sexe" name="sexe" type="text" placeholder="Enter your phone number" value="{{is_null($user->sexe) ? '' :$user->usernormal->nomFacebook}}">
                                </div>
                            </div>
                            
                            <!-- Save changes button-->
                            <button  type="submit" class="btn btn-primary" type="button">Sauvegarder</button>
                        
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    @endif
@endsection