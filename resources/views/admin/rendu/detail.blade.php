@extends('layouts.app')
@section('extra-js')
  <script>
    function toggleReplyComment(id){
    let element = document.getElementById('replyComment-'+ id);
    element.classList.toggle('d-none');
    }
  </script>
@endsection
 
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="content-wrapper"> <br>
      <div class="container-fluid">
        <div class="card">
            <div class="card-body ">
                <h5 class="card-title"> {{$rendu->titre}} </h5> <br>
                <p>{{$rendu->contenu}}</p>
                <div class="d-flex justify-content-between align-items-center">
                    <small> Posté le {{$rendu->created_at->format('d/m/y à H:m')}}</small> 
                    <span class="badge badge-primary"> par {{$rendu->user->name}} {{$rendu->user->prenom}}</span>
                </div> 
                <div class="d-flex justify-content-between align-items-center mt-3">
                  @can('update', $rendu)
                  <a class="btn btn-warning" href="{{route('rendu.edit', $rendu)}}"><i class="fas fa-edit"></i></a>
                  @endcan
                  @can('delete', $rendu)
                  <form action=" {{route('rendu.destroy', $rendu)}}" method="post" class="d-inline">
                    @csrf
                        @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                  </form>
                  @endcan
                </div>
            </div>
      </div>
      <hr>
      <h5> commentaire</h5>
@forelse ($rendu->comments as $comment)
    <div class="card mb-2 ">
      <div class="card-body d-flex">
        <div>
              {{$comment->content}}
            <div class="d-flex justify-content-between align-items-center">
              <small> Commenté le {{$comment->created_at->format('d/m/y à H:m')}}</small> 
              <span class="badge badge-primary"> {{$comment->user->name}} {{$comment->user->prenom}}</span>
            </div>
        </div>
        <div>
          <solution-button></solution-button>
        </div>
      </div>
    </div>
    @foreach ($comment->comments as $replyComment)
    <div class="card bg-warning mb-2 ml-5">
      <div class="card-body">
        {{$replyComment->content}}
        <div class="d-flex justify-content-between align-items-center">
          <small> repondu le {{$replyComment->created_at->format('d/m/y à H:m')}}</small> 
          <span class="badge badge-primary"> {{$replyComment->user->name}} {{$replyComment->user->prenom}}</span>
      </div>
      </div>
    </div>
    @endforeach
    <button class="btn btn-info   mb-3" onclick="toggleReplyComment({{$comment->id}})">reponse</button>
    <form action=" {{route('reponse.store', $comment)}}" method="post" class="ml-5 mb-3 d-none  " id="replyComment-{{$comment->id}}">
      @csrf
      <div class="form-group ">
        <label for="replyComment">ma reponse</label>
        <textarea class="form-control  @error('replyComment') is-invalid @enderror" name="replyComment" id="replyComment"  rows="2"></textarea>
        @error('replyComment')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      </div>
      <button type="submit" class="btn btn-warning"> Repondre</button> 
    </form>
    @empty
    <div class="alert alert-info">Aucun commentaire pour ce rendu</div>
    @endforelse
      <form action="{{route('comments.store', $rendu)}}" method="post">
      @csrf
      <div class="form-group">
        <label for="content"> votre commentaire</label>
        <textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content"  rows="5"></textarea>
        @error('content')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
      @enderror
      </div>
    <button type="submit" class="btn btn-primary"> Commenter</button>   
      </form>
    </div>
@endsection