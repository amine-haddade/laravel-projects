@extends('layout.navbareAdmin')
@section('content')

<main>
     @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <h1>ajouter produits</h1>
    <form method="post" enctype="multipart/form-data"  action="{{route('admin.store')}}">
        @csrf
        <div class="uploads-image">
            <p>image du produits</p>
            <label for="uploads-image" class="custom-uploads-image">
                <i class="fa-solid fa-file-arrow-up"></i>
                <p>Tél2charcher une image</p>
                <small>PNG,JPG,j'usqua 10MB</small>
            </label>
            <input name="image" type="file" id="uploads-image">
            @error('image')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="titre du produit">titre du produit</label>
            <input value="{{old('name')}}" name="name" placeholder="entrez le titre du produit" type="text" id="titre du produit"/>
            @error('name')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="prix du produit">prix du produit</label>
            <input  value="{{old('prix')}}" name="prix" placeholder="entrez le prix du produit" type="int" id="prix du produit"/>
            @error('prix')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="custom-input">
            <label for="categorie du produit">categorie du produit</label>
            <select name="categorie_id" >
                <option value="">open this select</option>
                @foreach ($Allcategories as $categorie)
                    <option value="{{$categorie->id}}">{{$categorie->libelle}}</option>
                @endforeach
            </select>
            @error('categorie_id')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit">ajouter le produis</button>
    </form>
</main>
@endsection
