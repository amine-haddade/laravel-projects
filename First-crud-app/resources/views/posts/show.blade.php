
@extends('layouts.app')
@section('title')
<title>show</title>
@endsection
@section('content')
        <div class="card  centered-card">
            <h5 class="card-header">Post info</h5>
            <div class="card-body">
            <h5 class="card-title">title:{{$post->title}}</h5>
            <p class="card-text">description: {{$post->description}}</p>
            </div>
        </div>
        <div class="card  centered-card">
            <h5 class="card-header">Post creator info</h5>
            <div class="card-body">
            <h5 class="card-title">name : {{$post->user ? $post->user->name: 'not found'}}</h5>{{-- get informationde user created postfrom model psot function user--}}
            <p class="card-text">email : {{$post->user ? $post->user->email: 'not found'}}</p>
            <p class="card-text">created at:{{$post->created_at}}</p>
            </div>
        </div>
    @endsection

