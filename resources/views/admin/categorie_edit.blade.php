@extends('layout.admin')
@section('title', 'wefashion - categorie_edit')
@section('content')

    <div class="container mt-5">
        <x-message />
        <form action="{{ route('admin.categorie_edit') }}" method="post" >
            @csrf
            <input type="hidden" name="id"  value="{{$categorie->id}}">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom de la catégorie </label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1" value="{{$categorie->name}}">
            </div>
            
            <button type="submit" class="btn btn-primary mb-3">Mettre à jour une categorie</button>
        </form>
    </div>

@endsection
