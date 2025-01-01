@extends('layouts.app')

@section('title')
<title>edit</title>
@endsection

@section('content')
<div class="container centered-card">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>

        </div>
    @endif
    <form class=""   method="POST" action="{{route('posts.update',$post_Edit->id)}}" >

        
        @csrf {{--  Il est important de mettre ce code --}}
        @method('PUT'){{--ajouter la méthode put dans la formulaire--}}
        <div class="d-flex flex-column gap-3">
            <div class="form-group ">
            <label for="exampleInputEmail1">title</label>
            <input value="{{$post_Edit->title}}" name="title" type="text" class="form-control mt-1"   placeholder="Enter email">       
            </div>
            <div class="form-group ">
            <label for="exampleInputPassword1">description</label>
            <textarea  name="description" class="form-control mt-1" id="exampleInputPassword1">{{$post_Edit->description}}</textarea>
            </div>
            <div class="form-group ">
                <label for="exampleInputEmail1">poste creator</label>
                <select name="post_creator" class="form-select mt-1" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($AllUsers as $user)
                    
                    <option value="{{$user->id}}" @selected($user->id===$post_Edit->user_id)  >{{$user->name}}</option>
                        
                    @endforeach
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-primary mt-3">update</button> 
        
      </form>
</div>

      
@endsection