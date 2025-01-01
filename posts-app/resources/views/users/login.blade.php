@extends('layouts.app')


@section('title','login')

@section('content')

<div class="content">
  <h1 class="text-center">se connecter</h1>
        <form action="{{route('users.dologin')}}" method="POST">
          @csrf
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Email address</label>
              <input value="{{old('email')}}" type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              @error('email')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Password</label>
              <input value="{{old('password')}}" type="password" name="password" class="form-control" id="exampleInputPassword1">
              @error('password')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
            <button type="submit" class="btn btn-primary">se connecter</button>
        </form>
</div>
@endsection