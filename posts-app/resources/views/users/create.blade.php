@extends('layouts.app')

@section('title','sing up')

@section('content')

<div class="content">
    <h1 class="text-center">créer un compte</h1>
          <form action="{{route('users.store')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label  class="form-label">name</label>
              <input value="{{old('name')}}" type="text" name="name" class="form-control" >
              @error('name')
                <p class="text-danger">{{$message}}</p>
              @enderror
            </div>
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
              <button type="submit" class="btn btn-primary">crée un compte</button>
          </form>
  </div>
  @endsection