<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/styleAdminePages.css')}}">
</head>
<body>
    <nav>
        <h1><a id="logo-nav" href="{{route('admin.index')}}">Admin Page </a></h1>
        <ul>
            <li><a href="{{route('admin.create')}}"><i class="fa-solid fa-cube"></i>ajouter produits</a></li>
            <li><a href="{{route('admin_livre.create')}}"><i class="fa-solid fa-square-poll-horizontal"></i>ajouter livre</a></li>
            <li><a href="{{route('admin.create_cat')}}"><i class="fa-solid fa-folder-plus"></i>ajouter categorie</a></li>
            <li><a href="{{route('admin.login')}}"><i class="fa-solid fa-folder-plus"></i>login</a></li>
            <li><a href="{{route('product.index')}}"><i class="fa-solid fa-folder-plus"></i>home page</a></li>
            <li>
                @auth
                <form class="nav-item" method="POST" action="{{route('admin.logout')}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="mx-2 btn btn-danger text-5">se déconnecter</button>                  
                </form>
                @endauth
            </li>
        </ul>
    </nav>

    @yield('content')
    
</body>
</html>