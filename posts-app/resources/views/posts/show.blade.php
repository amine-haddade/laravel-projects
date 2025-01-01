@extends('layouts.app')

@section('title','post '.$singlPost->id)
@section('content')


    <div class="content">
        <div class="card mb-2">
            <h5 class="card-header">Post data</h5>
            <div class="card-body">
              <h5 class="card-title">title : {{$singlPost->title}}</h5>
              <p class="card-text">description : {{$singlPost->description}}</p>
              <p class="card-text">created at : {{$singlPost->created_at}}</p>
              @if ($singlPost->image)
              <img src="{{asset('storage/image/'.$singlPost->image)}}" alt="current image " style="max-width: 200px;">                
              @endif
              <h5 class="card-title">name: {{$singlPost->user ? $singlPost->user->name : "not found"}}</h5> 
              <p class="card-text">email : {{$singlPost->user ?$singlPost->user->email : "not found"}}</p>
              <form action="{{ route('posts.toggleLike', $singlPost->id) }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; padding: 0;">
                    <i class="{{ $singlPost->isLiked ? 'like-post fa-solid fa-heart post-liked' : 'like-post fa-solid fa-heart' }}"></i>
                </button>
            </form>  
            </div>
        </div>
        
        <a id="btn-comment"  class="btn btn-success" href="{{route('comments.create',$singlPost->id)}}">add comment</a>
        
        <h1 id="title_comments">Comments</h1>
        @if($AllComents->isNotEmpty())
          @foreach($AllComents as $comment)
            <div class="singleComment">
              <h2>
                  <strong>{{ $comment->user->name }}</strong>
                  <small>{{ $comment->created_at }}</small>
              </h2>
              <p>{{ $comment->comment }}</p>
              <form method="POST" action="{{route('comments.destroy',[$singlPost->id,$comment->id])}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">remove comment</button>

              </form>
            </div>
          @endforeach
        @else
            <p>Aucun commentaire pour ce post.</p>
        @endif


      </div>
@endsection