@extends('layouts.app')


@section('content')


    <div class="content">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif

        <form method="POST" action="{{route('comments.store',$post->id)}}">
            @csrf
            <div class="mb-3">
              <label for="comment" class="form-label">comment</label>
              <textarea class="form-control" name="comment">{{old('comment')}}</textarea>
             

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
            <button type="submit" class="btn btn-primary">comment</button>
          </form>
    </div>
@endsection