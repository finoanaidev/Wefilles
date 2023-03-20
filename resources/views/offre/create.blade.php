@extends('layouts.blank')

@section('content')
<form action="{{route('offre.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <h5 class="form-title">Ajoutez un offre d'emploie</h5>
    <div class="form-group">
        <label for="jobTitle">Titre de l'offre d'emploi</label>
        <input type="text" name="titre" class="form-control" id="jobTitle" placeholder="Entrez le titre de l'offre d'emploi">
    </div>
    <div class="form-group">
        <label for="jobDescription">Description de l'offre d'emploi</label>
        <textarea class="form-control" name="description" id="jobDescription" rows="3"
            placeholder="Entrez la description de l'offre d'emploi"></textarea>
    </div>
    <div class="form-group">
        <label for="jobPhoto">Photo de l'offre d'emploi</label>
        <input type="file" name="image" class="form-control-file" id="jobPhoto">
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>
@endsection