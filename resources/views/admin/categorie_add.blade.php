@extends('layout.admin')
@section('title', 'wefashion - categorie_add')
@section('content')

    <div class="container mt-5 h-96 ">
        <x-message />
        <form action="{{ route('admin.categorie_add') }}" method="post" >
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label font-bold">Nom de la catégorie </label><br>
                <input name="name" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
            </div>
            
            <button type="submit" class="btn btn-active btn-primary mb-3">Ajouter une categorie</button>
        </form>
    </div>

@endsection
