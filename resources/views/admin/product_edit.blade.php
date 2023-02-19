@extends('layout.admin')
@section('title', 'wefashion - product_edit')
@section('content')
   
    <div class="container mt-5">
        <x-message />
        <form action="{{ route('admin.product_edit') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $product->id }}">
            <div class="mb-3">
                <img src="{{ URL::to($product->image) }}" width="200px" alt="">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom du produit </label>
                <input name="name" type="text" class="form-control" id="exampleFormControlInput1"
                    value="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" type="password" class="form-control" id="exampleFormControlInput1">
                    {{ $product->description }}
                </textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Prix du produit </label>
                <input name="price" type="text" class="form-control" id="exampleFormControlInput1"
                    value="{{ $product->price }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Le produit sera t-il visible sur la
                    boutique</label>
                <select name="isVisible" id="">
                    <option value=1 @selected($product->isVisible == 1) >oui</option>
                    <option value=0  @selected($product->isVisible != 1) >non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Le produit sera t-il en solde</label>
                <select name="isDiscount" id="">
                    <option value=1 @selected($product->isDiscount == 1)>oui</option>
                    <option value=0 @selected($product->isDiscount != 1)>non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Référence du produit</label>
                <input name="reference" type="text" class="form-control" id="exampleFormControlInput1"
                    value="{{ $product->reference }}">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Catégorie du produit</label>
                <select name="category_id" id="">
                    @foreach ($categories as $c)
                        @if ($c->id == $product->category_id)
                            <option value={{ $c->id }} selected>{{ $c->name }}</option>
                        @else
                            <option value={{ $c->id }}>{{ $c->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image du produit</label>
                <input name="image" type="file" class="form-control" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tailles dans lequel le produit sera dispo</label>
                @foreach ($sizes as $s)
                    <div class="form-check">
                        @if ($product->sizes->where('id', $s->id)->first() !== null)
                            <input class="form-check-input" type="checkbox" value={{ $s->id }} name="size[]"
                                checked>
                        @else
                            <input class="form-check-input" type="checkbox" value={{ $s->id }} name="size[]">
                        @endif
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $s->name }}
                        </label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary mb-3">Modifier un produit</button>
        </form>
    </div>

@endsection
