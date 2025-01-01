@extends('layouts.app')

@section('title','posts app')
@section('content')


<div class="content">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if(session('warning'))
        <div class="alert alert-warning">
            {{session('warning')}}
        </div>
    @endif
    <div class="head-page">
        <a href="{{route('posts.create')}}" class="btn btn-success  add-post">add new  post</a>
        <form action="{{ route('posts.index') }}" method="GET">
            @csrf
            <input type="text" class="form-control" name="serche" placeholder="taper votre recherche">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        
    </div>
    <table class="table ">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">created at</th>
            <th class=""  >action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($AllPosts as $post)
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user ? $post->user->name:"" }}</td>
                <td>{{$post->created_at}}</td>
                <td class="boxButton">
                    <a  class="btn btn btn-outline-primary  mx-2" href="{{route('posts.show',$post->id)}}">show</button>
                    <a  class="btn btn-outline-success mx-2" href="{{route('posts.edit',$post->id)}}">edit</a>
                    <form class="form-remove-post" method="post" action="{{route('posts.destroy',$post->id)}}" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"  class="btn btn-outline-danger mx-2" >remove</button>
                    </form>
                </td>
                </tr>  
            @endforeach
            
        </tbody>
    </table>
<div> 



@endsection