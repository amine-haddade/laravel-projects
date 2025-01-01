@extends('layout.navbareAdmin')
    @section('content')
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">prix</th>
                <th scope="col">categorie</th>
                <th scope="col">action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($AllProducts as $product )
                <tr>
                    <th scope="row">{{$product->id}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->prix}}</td>
                    <td>{{$product->categorie->libelle}}</td>
                    <td>
                      <form class="form-remove-product" action="{{route('product.destroy',$product->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">remove</button></td>
                      </form>

                  </tr>
                @endforeach
            </tbody>
          </table>
@endsection


