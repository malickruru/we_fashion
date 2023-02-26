@extends('layout.mainLayout')
@section('title', 'wefashion - login')
@section('content')
    <div class="container flex justify-center items-center h-screen">
        <x-message />
        <div >
            <h1 class="text-4xl my-2">
                Connexion
            </h1>
            <form action="{{route('login')}}" method="post" >
                @csrf
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label font-bold" >Email </label>
                    <input name="email" type="email" class="input w-full max-w-xs" id="exampleFormControlInput1" placeholder="name@example.com">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label font-bold">Mot de passe</label>
                    <input name="password" type="password" class="input w-full max-w-xs" id="exampleFormControlInput1">
                </div>
                <button type="submit" class="btn btn-active btn-primary mb-3">Se connecter</button>
            </form>
        </div>
        
    </div>

@endsection
