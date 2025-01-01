@extends('layout.navbare')
@section('content')

    <div id="banner-home-page">
        <h1>bienvenu sur Shopstyle</h1>
        <p>découvrire notre collection exclusive de produist tendance àdes prix imnattebles </p>
    </div>

    <div class="prductsHomePages">
        
        <h1 id="title-products-home-page">Nos produits phares</h1>
        <div class="products">
            @foreach ($products as $product )
            <div  class="singl-product">
                
                <img src="{{ asset('storage/img/'.$product->image) }}" alt="{{ $product->image }}">
                <h1>{{$product->name}}</h1>
                <p class="prix">{{$product->prix}}</p>
                <p>{{$product->categorie->libelle}}</p>
                
                <button>ajouter au panier</button>
            </div>
            @endforeach
           
        </div>
        
    </div>
@endsection