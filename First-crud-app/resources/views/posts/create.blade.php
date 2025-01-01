@extends('layouts.app')

@section('title')
<title>create</title>
@endsection

{{-- validation show error  --}}

@section('content')
<div class="container centered-card">
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form class=""   method="POST" action="{{route('posts.store')}}">
        @csrf {{--  Il est important de mettre ce code --}}
        <div class="d-flex flex-column gap-3">
            <div class="form-group ">
            <label for="exampleInputEmail1">title</label>
            <input name="title" type="text" class="form-control mt-1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value={{old('title')}}>       
            </div>
            <div class="form-group ">
            <label for="exampleInputPassword1">description</label>
            <textarea name="description" class="form-control mt-1" id="exampleInputPassword1">{{old("description")}}</textarea>
            </div>
            <div class="form-group ">
                <label for="exampleInputEmail1">poste creator</label>
                <select name="post_creator" class="form-select mt-1" aria-label="Default select example">
                    <option selected value=""  >Open this select menu</option>
                    @forEach($AllUsers as $user)
                    <option value={{$user->id}} {{old('post_creator') == $user->id ? 'selected' : '' }} >{{$user->name}}</option>
                    @endforeach

                    
                    
                </select>
            </div>
        </div>
            <button type="submit" class="btn btn-success mt-3">Submit</button> 
        
      </form>
      {{-- @dd($errors) --}}


      <!--   old =>globel helpers méthod permet d'afficher la derniér valuer d'input aprés de refrecher la page    -->
</div>

      
@endsection