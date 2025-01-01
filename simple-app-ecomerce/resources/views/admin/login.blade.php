@extends('layout.navbareAdmin')
@section('content')

<main>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="form_admin" method="POST"  action="{{route('admin.dologin')}}">
        <h1>login admin</h1>
        <p>Enter your username and password to login</p>
        @csrf
        <div class="custom-input">
            <label for="username">username</label>
            <input value="{{old('username')}}" name="username" placeholder="entrez votre username" type="text" id="username"/>
            @error('username')
            <p class="text-danger">{{$message}}</p>
        @enderror
        </div>
        <div class="custom-input">
            <label for="password">password</label>
            <input value="{{ old('password') }}" name="password" placeholder="entrez le password" type="password" id="password"/>
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit">login</button>
    </form>
</main>
@endsection
