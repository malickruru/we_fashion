@extends('layout.customer')
@section('title', 'wefashion - accueil')
@section('content')
<div class="container mt-5">
    <x-message/>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            {{$products->count()}} résultats
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex flex-wrap justify-content-around">
            @foreach ($products as $p)
                <x-card :link="$p->id" :image="$p->image" :name="$p->name" :price="$p->price" />
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12 d-flex justify-content-end">
            {{$products->onEachSide(1)->links('pagination.custom')}}
            
        </div>
    </div>
</div>
@endsection