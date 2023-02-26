@extends('layout.admin')
@section('title', 'wefashion - product_add')
@section('content')

    <div class="container mt-5">
        <x-message />
        {{-- <form action="{{ route('admin.product_add') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom du produit </label>
                <input name="name" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea name="description" type="password" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Prix du produit </label>
                <input name="price" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Le produit sera t-il visible sur la
                    boutique</label>
                <select name="isVisible" id="">
                    <option value=1>oui</option>
                    <option value=0>non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Le produit sera t-il en solde</label>
                <select name="isDiscount" id="">
                    <option value=1>oui</option>
                    <option value=0>non</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Référence du produit</label>
                <input name="reference" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Catégorie du produit</label>
                <select name="category_id" id="">
                    @foreach ($categories as $c)
                        <option value={{ $c->id }}>{{ $c->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Image du produit</label>
                <input name="image" type="file" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tailles dans lequel le produit sera dispo</label>
                    @foreach ($sizes as $s)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value={{ $s->id }} name="size[]">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $s->name }}
                        </label>
                    </div>
                    @endforeach
            </div>
            <button type="submit" class="btn btn-primary mb-3">Ajouter un produit</button>
        </form> --}}
        <form action="{{ route('admin.product_add') }}" method="post" enctype="multipart/form-data" class="container">
            @csrf
            <h1 class="text-4xl m-3 text-center">
                Ajouter un produit
            </h1>
            <div class="row flex">
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Nom du produit </label> <br>
                        <input name="name" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="font-bold">Description</label> <br>
                        <textarea name="description" type="password" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1">
                            
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Prix du produit </label> <br>
                        <input name="price" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Le produit sera t-il visible sur la
                            boutique</label> <br>
                        <select name="isVisible" class="select select-bordered w-full max-w-xs" id="">
                            <option value=1  >oui</option>
                            <option value=0   >non</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Le produit sera t-il en solde</label> <br>
                        <select name="isDiscount" class="select select-bordered w-full max-w-xs" id="">
                            <option value=1 >oui</option>
                            <option value=0 >non</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Référence du produit</label> <br>
                        <input name="reference" type="text" class="input-bordered input w-full max-w-xs" id="exampleFormControlInput1"
                            >
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="font-bold">Catégorie du produit</label> <br>
                        <select name="category_id" class="select select-bordered w-full max-w-xs" id="">
                            @foreach ($categories as $c)
                               
                                    <option value={{ $c->id }}>{{ $c->name }}</option>
                                
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
    
                                    <input class="checkbox checkbox-success" type="checkbox" value={{ $s->id }} name="size[]">
                                
                                <label class="form-check-label" for="flexCheckDefault">
                                    {{ $s->name }}
                                </label> <br>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="mb-3 w-full flex justify-center">
                <button type="submit" class="btn btn-active btn-primary mb-3">Ajouter un produit</button>

            </div>
        </form>
    </div>

@endsection
