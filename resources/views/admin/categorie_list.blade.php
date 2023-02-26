@extends('layout.admin')
@section('title', 'wefashion - categorie_list')
@section('content')

    <div class="container mt-5 h-96">
        <div class="row">
            <div class="col-12">
                <x-message />
            </div>
        </div>
        
        <div class="row ">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('admin.categorie_add_form') }}" class="btn btn-primary ">Nouveau</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped w-full">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nom</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $c)
                            <tr>
                                <th scope="row">{{ $c->id }}</th>
                                <td>{{ $c->name }}</td>
                                <td><a class="btn  btn-primary" href="{{ route('admin.categorie_edit_form', ['id' => $c->id]) }}">modifier</a></td>
                                <td>
                                    <form action="{{ route('admin.categorie_delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $c->id }}">
                                        <button type="submit" class="btn btn-error"
                                            title="attention cette action est irréversible">supprimer</a>
                                    </form>

                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                    
                </table>
                
            </div>
        </div>
        
    </div>

@endsection
