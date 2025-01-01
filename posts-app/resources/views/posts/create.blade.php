@extends('layouts.app')

@section('title','create post')
@section('content')

{{-- @if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

</div>
@endif --}}

    <div class="content">
        <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="image" class="form-label">image</label>
              <input type="file" class="form-control" name="image" id="image" value="test test">
              @error('image')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">title</label>
              <input type="text" class="form-control" name="title" id="title" value="{{old('title')}}">
              @error('title')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="description" class="form-label">description</label>
              <textarea class="form-control" name="description">{{old('description')}}</textarea>
                @error('description')
                    <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            @guest
            <div class="mb-3">
              <select name="user_id" class="form-select" aria-label="Default select example">
                  <option value="" selected>Open this select menu</option>
                  @foreach ($AllUsers as $user)
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
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form> 
    </div>
@endsection