@extends('layout.navbareAdmin')
@section('content')

<main>
    @if($errors->any()) <!-- Vérifie s'il y a des erreurs -->
    <div class="alert alert-danger">
        @foreach($errors->all() as $error) <!-- Affiche toutes les erreurs -->
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

    <h1>ajouter catégorie</h1>
    <form method="post" enctype="multipart/form-data"  action="{{route('admin.store_cate')}}">
        @csrf
        <div class="uploads-image">
            <p>image du categorie</p>
            <label for="uploads-image" class="custom-uploads-image">
                <i class="fa-solid fa-file-arrow-up"></i>
                <p>Tél2charcher une image</p>
                <small>PNG,JPG,j'usqua 10MB</small>
            </label>
            <input name="image_categorie" type="file" id="uploads-image">
            @error('image_categorie')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="titre de categorie">titre de categorie</label>
            <input value="{{old('libelle')}}" name="libelle" placeholder="entrez le titre du produit" type="text" id="titre du produit"/>
            @error('libelle')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        
        
        <button type="submit">ajouter le categorie</button>
    </form>
</main>
@endsection
