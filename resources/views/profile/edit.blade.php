@extends('layouts.blank')

@section('content')
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <form action="{{route('profile.store',  Auth::user()->id)}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Photo de profile</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="{{ is_null($user->entreprise) ? "" : asset('storage/'.$user->entreprise->image ?? '')}}" alt=""
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
                                <label class="small mb-1" for="inputOrgName">Domaine</label>
                                <input class="form-control" id="inputOrgName"  name="domaine" type="text" placeholder="Enter your organization name" value="{{is_null($user->entreprise) ? '' : $user->entreprise->domaine}}">
                            </div>
                            <!-- Form Group (location)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="inputLocation">Address</label>
                                <input class="form-control" id="inputLocation" name="address" type="text" placeholder="Enter your location" value="{{is_null($user->entreprise) ? '' : $user->entreprise->address}}">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="inputEmailAddress">Email </label>
                            <input class="form-control" id="inputEmailAddress" name="email" type="email" placeholder="Enter your email address" value="{{$user->email}}">
                        </div>
                        <!-- Form Row-->
                        <div class="row">
                            <div class="col-md-6">

                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="inputPhone">Phone number</label>
                                        <input class="form-control" id="inputPhone" name="numero" type="tel" placeholder="Enter your phone number" value="{{is_null($user->entreprise) ? '' : $user->entreprise->numero}}">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (phone number)-->
                                    <div class="col-md-12">
                                        <label class="small mb-1" for="nomGit">A propos</label>
                                        <textarea class="form-control" id="nomGit" name="apropos"  rows="6" type="text" placeholder="">{{is_null($user->entreprise) ? '' : $user->entreprise->apropos}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="description">Description</label>
                                <textarea name="description" class="form-control"id="description" cols="30" rows="10">{{is_null($user->entreprise) ? '' : $user->entreprise->description}}</textarea>
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
@endsection