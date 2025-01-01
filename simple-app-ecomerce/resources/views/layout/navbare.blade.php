<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/styleAdminePages.css')}}">

    <title>Document</title>
</head>
<body>
    <header>
            <ul class="col-1">
                <li class="logo"><i class="fa-solid fa-cart-shopping"></i><a href="{{route('product.index')}}">shop style</a></li>
                <li><a>Produits</a></li>
                <li><a>catégorie</a></li>
                <li><a>nouveautés</a></li>
                <li><a href="{{route('product.books')}}" >bibliothéque</a></li>
                <li><a href="{{ route('admin.index') }}">Admin Page</a></li>
            </ul>
            <ul class="col-2">
                <div id="serch-input"><i class="fa-solid fa-magnifying-glass"></i><input placeholder="des produits..." type="text"> </div>
                <div class="box-icon-panier"><i class="fa-solid fa-cart-arrow-down"></i></div>
                @auth
                <div class="box-icon-panier"><i class="fa-regular fa-user"></i></div>

                <form class="nav-item" method="POST" action="{{route('product.logout')}}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="mx-2 btn btn-danger text-5">se déconnecter</button>                  
                </form>
                @endauth
            </ul>

    </header>
    @yield('content')
    
</body>
</html>