@extends('layouts.blank')
@section('style')
    <style>
    body{
    margin-top:20px;
    background:#eee;
}
@media (min-width: 0) {
    .g-mr-15 {
        margin-right: 1.07143rem !important;
    }
}
@media (min-width: 0){
    .g-mt-3 {
        margin-top: 0.21429rem !important;
    }
}

.g-height-50 {
    height: 50px;
}

.g-width-50 {
    width: 50px !important;
}

@media (min-width: 0){
    .g-pa-30 {
        padding: 2.14286rem !important;
    }
}

.g-bg-secondary {
    background-color: #fafafa !important;
}

.u-shadow-v18 {
    box-shadow: 0 5px 10px -6px rgba(0, 0, 0, 0.15);
}

.g-color-gray-dark-v4 {
    color: #777 !important;
}

.g-font-size-12 {
    font-size: 0.85714rem !important;
}

.media-comment {
    margin-top:20px
}

    </style>  
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
    @if (!is_null($forums))
        @foreach ($forums as $forum)
        <div class="col-md-12">
            <div class="media g-mb-30 media-comment">
                
                <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                  <div class="g-mb-15">
                    <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$forum->user->name}}</h5>
                  </div>
            
                  <p>{{$forum->titre}}</p>
            
                  <ul class="list-inline d-sm-flex my-0">
                    <li class="list-inline-item ml-auto">
                      <a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" href="{{route('forum.show', $forum->id)}}">
                        <i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
                        Voir le forum
                      </a>
                    </li>
                  </ul>
                </div>
            </div>
        </div>
        @endforeach
    @endif
    </div>
    <div class="col-md-4 mt-5">
        <form action="{{route('forum.store')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Nom Forum</label>
                <input type="text" name="titre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="J'ai besoin de travail a court terme">
            </div>
            <button type="submit" class="btn btn-info mt-3">Creer</button>
        </form>
    </div>
</div>
@endsection