@extends('layouts.app')

@section('title','edit post')
@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif

    <div class="content">
        <form method="POST" action="{{route('posts.update',$PostsEdit->id)}}"  enctype="multipart/form-data" >
            @csrf
            @method('PUT')
            <label for="image" class="form-label">image</label>

            @if ($PostsEdit->image)
            <div>
              <img src="{{asset('storage/image/'.$PostsEdit->image)}}" alt="current image " style="max-width: 200px;">
              <p>current image {{$PostsEdit->image}}</p>
            </div>
            @endif
            <div class="mb-3">
              <input value="{{$PostsEdit->image}}" type="file" class="form-control" name="image" id="image" >
            </div>  
           
            <div class="mb-3">
              <label for="title" class="form-label">title</label>
              <input value="{{$PostsEdit->title}}" type="text" class="form-control" name="title" id="title" >
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">description</label>
              <textarea class="form-control" name="description">{{$PostsEdit->description}}</textarea>
            </div>
            @guest
            <div class="mb-3">
              <select name="user_id" class="form-select" aria-label="Default select example">
                  <option value="" selected>Open this select menu</option>
                  @foreach ($AllUser as $user)
                  <option value="{{$user->id}}"  @selected(old('user_id')==$user->id)>{{$user->name}}</option>
                  @endforeach
              </select>
              @error('user_id')
              <p class="text-danger">{{$message}}</p>
            @enderror
          </div>
          @endguest

          @auth
          <div class="mb-3">
            <input value="{{Auth::user()->id}}" type="hidden"  name="user_id">
              @error('user_id')
                  <p class="text-danger">{{$message}}</p>
              @enderror
          </div>
          @endauth
            <button type="submit" class="btn btn-primary">update</button>
          </form>
    </div>
@endsection