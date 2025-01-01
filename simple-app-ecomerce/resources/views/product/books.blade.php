@extends('layout.navbare')
@section('content')

    <div id="banner-home-page"  class="banner-home-page-books">
        <h1>bienvenu sur Shopstyle</h1>
        <p>découvrire notre collection exclusive de produist tendance àdes prix imnattebles </p>
    </div>
    
    <div class="prductsHomePages-books">
        <div class="products-books" >
            @foreach ($allBooks as $books )
            <div class="singl-product-books">
                <div class="image-books">
                    <img src="{{ asset('storage/'.$books->image_livre) }}" alt="{{ $books->image }}">
                </div>   
                <h1>{{$books->titre_livre}}</h1>
                <p class="prix">{{$books->prix_livre}}</p>
                <p>devloppement personelle</p>
                <div class="books-down">
                    <a class="btn-read" href="{{route('books.read',$books->id)}}" target="_blank"><button><i class="fa-solid fa-book"></i>Lire</button></a>
                    <a class="btn-read"  href="{{route('books.download',$books->id)}}" ><button><i class="fa-solid fa-download"></i>download</button></a>
                </div>
                <button>ajouter au panier</button>
            </div>
            @endforeach
        </div>
    </div>
   
@endsection