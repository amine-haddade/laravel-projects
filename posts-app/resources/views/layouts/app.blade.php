<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    <title>posts app</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="fs-2 navbar-brand" href="#">posts app</a>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class=" fs-4 nav-link active pt-3" aria-current="page" href="{{route('posts.index')}}">all posts</a>
              </li>
              <li class="nav-item">
                <a class="fs-4 nav-link pt-3" href="{{route('users.login')}}">login</a>
              </li>
            </ul>
            <h3 class="navbar-text">
              @auth
                {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </h3>
                <form class="nav-item" action="{{route('users.logout')}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit"  class="mx-2 btn btn-danger text-5">se déconnecter</button>                  
                </form>

              @endauth
              @guest
                <a  href="{{route('users.login')}}" class="btn btn-success text-white text-5"> se connecter</a>
                <a  href="{{route('users.create')}}" class="btn btn-info text-white text-5 mx-2"> crée un compte</a>
              @endguest
            
            
          </div>
        </div>
      </nav>
      @yield('content')
</body>
</html>