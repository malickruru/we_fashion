@extends('layout.customer')
@section('title', 'wefashion - voir produit')
@section('content')
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-8 d-flex align-items-center flex-column" >
                <div>
                    <img src={{ URL::to($product->image) }} height="400px"  alt="">

                </div>
                <p class="m-3 w-75">
                    {{ $product->description }}
                </p>
            </div>
            <div class="col-md-4">
                <h1>
                    {{ $product->name }}
                </h1>
                <p>
                    {{ $product->categorie->name }}
                </p>
                <h4>
                    {{ number_format($product->price, 2, ',', ' ') }} €
                </h4>
                @if ($product->isDiscount)
                    <span class="badge text-bg-warning">en solde</span>
                @endif

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tailles </label>
                        <select name="size" class="form-control">
                            @foreach ($product->sizes as $s)
                                <option value={{ $s->id }}>{{ $s->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-success" type="submit">Acheter</button>
                </form>
            </div>
        </div>
    </div>
@endsection
