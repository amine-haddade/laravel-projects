@extends('layouts.app')

@section('title')
<title>index</title>
@endsection

@section('content')

    <div class="container d-flex align-items-center justify-content-center ">
        <a href="{{route('posts.create')}}" class="btn btn-success my-4 " >create posts</a>
    </div>
    <div class="container-fluid" id="table">
      <table class="table  centered-table mt-4">
        
        
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">title</th>
            <th scope="col">posted by</th>
            <th scope="col">create at</th>
            <th scope="col">action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($allposts as $value)
          <tr>
            <th scope="row">{{$value->id}}</th>
            <td>{{$value->title}}</td>
            <td>{{$value->user ? $value->user->name: 'not found'}}</td>
            <td>{{$value->created_at->format('d-m-Y')}}</td>
            <td>
              <a href="{{route('posts.show',$value->id)}}" type="button" class="btn btn-info mx-1">view</a>
              <a href="{{route('posts.edit',$value->id)}}" type="button" class="btn btn-primary mx-1">edit</a>
              <form method="post" action="{{route('posts.destroy',$value->id)}}" style="display: inline">
                @csrf
                @method('DELETE')
                <button onclick="confirmDlete(event)" type="submit" class="btn btn-danger mx-1">remove</button>

              </form>
            </td>
          </tr>
        @endforeach
          
        
          
          
        </tbody>
      </table>
    </div>
   <script>
      document.addEventListener('DOMContentLoaded', (event) => {
        const Dletebuttons=document.querySelectorAll(".btn-danger")
        Dletebuttons.forEach(button => {
          button.addEventListener("click",(event)=>{
            if(!confirm("do you want to delete post")){
              event.preventDefault()
            }
          })
          
        });
      })
    </script>
@endsection


