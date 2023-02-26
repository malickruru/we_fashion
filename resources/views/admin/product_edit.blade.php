@extends('layout.admin')
@section('title', 'wefashion - product_edit')
@section('content')
   
    <div class="container mt-5">
        <x-message />
        <form action="{{ route('admin.product_edit') }}" method="post" enctype="multipart/form-data" class="container">
            @csrf
            <h1 class="text-4xl m-3 text-center">
                Modifier un produit
            </h1>
            <div class="row flex">

                <div class="mb-3 w-full flex justify-center">
                    <img src="{{ URL::to($product->image) }}" width="200px" alt="">
                </div>
                <div class="col-md-6">
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Nom du produit </label> <br>
                        <input name="name" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            value="{{ $product->name }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="font-bold">Description</label> <br>
                        <textarea name="description" type="password" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
                            {{ $product->description }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Prix du produit </label> <br>
                        <input name="price" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            value="{{ $product->price }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Le produit sera t-il visible sur la
                            boutique</label> <br>
                        <select name="isVisible" class="select select-bordered w-full max-w-xs" id="">
                            <option value=1 @selected($product->isVisible == 1) >oui</option>
                            <option value=0  @selected($product->isVisible != 1) >non</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Le produit sera t-il en solde</label> <br>
                        <select name="isDiscount" class="select select-bordered w-full max-w-xs" id="">
                            <option value=1 @selected($product->isDiscount == 1)>oui</option>
                            <option value=0 @selected($product->isDiscount != 1)>non</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Référence du produit</label> <br>
                        <input name="reference" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            value="{{ $product->reference }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Catégorie du produit</label> <br>
                        <select name="category_id" class="select select-bordered w-full max-w-xs" id="">
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
                        <label for="exampleFormControlInput1" class="font-bold">Image du produit</label> <br>
                        <input name="image" type="file" class="file-input file-input-bordered file-input-success w-full max-w-xs" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Tailles dans lequel le produit sera dispo</label> <br>
                        @foreach ($sizes as $s)
                            <div class="form-check">
                                @if ($product->sizes->where('id', $s->id)->first() !== null)
                                    <input class="checkbox checkbox-success" type="checkbox"  value={{ $s->id }} name="size[]"
                                        checked>
                                @else
                                    <input class="checkbox checkbox-success" type="checkbox" value={{ $s->id }} name="size[]">
                                @endif
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $s->name }}
                                </label> <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="mb-3 w-full flex justify-center">
                <button type="submit" class="btn btn-active btn-primary mb-3">Modifier un produit</button>

            </div>
        </form>
    </div>

@endsection
