@extends('layout.mainLayout')
@section('title', 'wefashion - login')
@section('content')
    <div class="container">
        <x-message />
        <form action="{{route('login')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email </label>
                <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Mot de passe</label>
                <input name="password" type="password" class="form-control" id="exampleFormControlInput1">
            </div>
            <button type="submit" class="btn btn-primary mb-3">Se connecter</button>
        </form>
    </div>

@endsection
