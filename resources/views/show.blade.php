@extends('layout.customer')
@section('title', 'wefashion - voir produit')
@section('content')
    <div class="container mt-5">
        <x-message />
        <div class="row">
            <div class="col-md-8 d-flex align-items-center flex-column" >
                <div class="artboard phone-1">
                    <img src={{ URL::to($product->image) }}   alt="">

                </div>
                <p class="m-3 w-75">
                    {{ $product->description }}
                </p>
            </div>
            <div class="col-md-4">
                <h1 class="text-4xl my-2">
                    {{ $product->name }}
                </h1>
                <p class="my-2">
                    {{ $product->categorie->name }}
                </p>
                <h4 class="text-slate-600 my-2">
                    {{ number_format($product->price, 2, ',', ' ') }} €
                </h4>
                @if ($product->isDiscount)
                    <span class="badge text-bg-warning">en solde</span>
                @endif

                <form action="{{route('cart.add',['id' => $product->id ,'price' => $product->price,'quantity' => 1,'option' => $product])}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label font-bold">Tailles </label><br>
                        <select name="size" class=" select w-full max-w-xs">
                            @foreach ($product->sizes as $s)
                                <option value={{ $s->id }}>{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-active btn-success" type="submit">Acheter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
