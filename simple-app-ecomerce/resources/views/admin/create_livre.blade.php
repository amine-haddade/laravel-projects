@extends('layout.navbareAdmin')
@section('content')

<main>
     @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
    <h1>ajouter Livre</h1>
    <form method="post" enctype="multipart/form-data"  action="{{route('admin_livre.store')}}">
        @csrf
        <div class="uploads-image">
            <p>image du Livre</p>
            <label for="uploads-image" class="custom-uploads-image">
                <i class="fa-solid fa-file-arrow-up"></i>
                <p>Tél2charcher une image</p>
                <small>PNG,JPG,j'usqua 10MB</small>
            </label>
            <input name="image_livre" type="file" id="uploads-image">
            @error('image_livre')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="titre du produit">titre du Livre</label>
            <input value="{{old('titre_livre')}}" name="titre_livre" placeholder="entrez le titre du produit" type="text" id="titre du produit"/>
            @error('titre_livre')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="prix du produit">prix du Livre</label>
            <input  value="{{old('prix_livre')}}" name="prix_livre" placeholder="entrez le prix du produit" type="int" id="prix du produit"/>
            @error('prix_livre')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="custom-input">
            <label for="pdf du produit">pdf du Livre</label>
            <input class="input_pdf_livre" value="{{old('pdf')}}" name="pdf" placeholder="entrez le pdf du produit" type="file" id="pdf du produit"/>
            @error('pdf')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="custom-input">
            <label for="categorie du produit">categorie du Livre</label>
            <select name="categorie_id" >
                <option value="">education</option>
                <option value="">devloppement personnel</option>
                
            </select>
            
        </div>
        <div class="custom-input">
            <label for="description">description</label>
            <textarea    name="description" placeholder="entrez le pdf du livre"  id="input-description">
                {{old('description')}}
            </textarea>
            @error('description')
                <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit">ajouter le livre</button>
    </form>
</main>
@endsection
