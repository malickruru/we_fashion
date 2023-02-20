@extends('layout.customer')
@section('title', 'wefashion - panier')
@section('content')
    <div class="container mt-5">
        <x-message />
        <div class="row">
            <div class="col-md-12 " >
                <h1>Mon panier</h1>
                <table class="table table-striped">
                <thead>
                    <tr>
                        <th table-striped scope="col">Produit</th>
                        <td></td>
                        <td></td>
                        
                        <th scope="col">Prix</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $product)
                        <tr>
                            <td>
                                <img src="{{URL::to($product['option']['image'])}}" width="100px" alt="">
                            </td>
                            <td>
                                {{$product['option']['name']}}
                            </td>
                            <td>
                                <form action="{{route('cart.update.quantity',['id' => $product['id'] ])}}" method="POST">
                                    @csrf
                                    <input type="number" name="newQuantity" min="1" value="{{$product['quantity']}}">
                                    <button class="btn btn-primary" title="mettre à jour la quantitée"><i class="bi bi-arrow-down-up"></i></button>
                                </form>
                                
                            </td>
                            <td>
                                {{ number_format($itemTotals[$product['id']], 2, ',', ' ') }} €
                            </td>
                            <td>
                                <form action="{{route('cart.remove',['id' => $product['id'] ])}}" method="POST" >
                                    @csrf
                                    <button class="btn btn-danger" title="retirer du panier"><i class="bi bi-slash-circle"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <th>
                            TOTAL : {{ number_format($cartTotal, 2, ',', ' ') }} €
                        </th>
                    </tr>
                </tbody>
            </table>
            <form action="{{route('cart.clear')}}" method="POST">
                @csrf
    
                <button class="btn btn-danger m-3" title="vider le panier"><i class="bi bi-trash"></i></button>
            </form>
            
            </div>
        </div>
    </div>
@endsection
