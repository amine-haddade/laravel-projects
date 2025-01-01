@extends('layout.navbare')
@section('content')

<main>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form id="form_admin" method="POST"  action="{{route('product.dologin')}}">
        <h1>login user</h1>
        <p>Enter your email and password to login</p>
        @csrf
        <div class="custom-input">
            <label for="email">email</label>
            <input value="{{old('email')}}" name="email" placeholder="entrez votre email" type="text" id="email"/>
            @error('email')
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
