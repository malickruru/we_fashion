@extends('layout.admin')
@section('title', 'wefashion - product_list')
@section('content')

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <x-message />
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-end">
                {{$products->lastItem().' articles sur '.$products->total()}}
            </div>
        </div>
        <div class="row ">
            <div class="col-12 d-flex justify-content-end">
                <a href="{{ route('admin.product_add_form') }}" class="btn btn-primary ">Nouveau</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped w-full">
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Prix</th>
                            <th scope="col">Etat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $p)
                            <tr>
                                <th scope="row">{{ $p->name }}</th>
                                <td>{{ $p->categorie->name }}</td>
                                <td>{{number_format($p->price, 2, ',', ' ')}} €</td>
                                <td>
                                    @if ($p->isDiscount)
                                        en solde
                                    @else
                                        standard
                                    @endif
                                </td>
                                <td><a class="btn  btn-primary" href="{{ route('admin.product_edit_form', ['id' => $p->id]) }}">modifier</a></td>
                                <td>
                                    <form action="{{ route('admin.product_delete') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $p->id }}">
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
        <div class="row my-3">
            <div class="col-12 flex justify-end">
                {{ $products->links('pagination.custom') }}
            </div>
        </div>
    </div>

@endsection
