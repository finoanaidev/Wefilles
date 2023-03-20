@extends('layouts.blank')


@section('content')
    <section>
        <div class="container">
            <h1>Forum de discussion</h1>
    
            <div class="card" style="margin-bottom: 3em;">
                <div class="card-body">
                    <h4 class="card-title" style="margin-bottom: 1em;">{{$forum->titre}}</h4>
                </div>
            </div>
            @if (!is_null($forum->comments))
            <div class="row commentaires" style="margin-bottom: 3em;">
                <div class="col-lg-8">
                    <h2>Commentaires</h2>
                    <ul class="list-group">
                        <!-- DEBUT COMMENTAIRE -->
                        @foreach ($forum->comments as $comment)
                        <li class="list-group-item mt-4">
                            <div class="comment">
                                <div class="user" style="
                                        display: flex;
                                        align-items: center;
                                        margin-bottom: 1.5em;
                                    ">
                                    <div class="name">{{$comment->user->name}}</div>
                                </div>
                                <div class="comment-text">
                                    <p>{{$comment->comment}}</p>
                                    <small class="text-muted">{{date_format(new dateTime($comment->created_at),'d/m/Y')}}</small>
                                </div>
                            </div>
                        </li>                          
                        @endforeach
                        <!-- FIN COMMENTAIRE -->
                    </ul>
    
                </div>
            </div>
            @endif
    
            <div class="row">
                <div class="col-lg-12">
                    <h2>Ajouter un commentaire</h2>
                    <form action="{{route('comment.store', $forum->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="comment">Commentaire:</label>
                            <textarea id="comment" name="comment" class="form-control" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Commenter</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection