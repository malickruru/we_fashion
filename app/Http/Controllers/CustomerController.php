<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    // ce controller contient les methode d'affichage des vue de l'interface client

    // méthode ne retournant que les produit visible sur l'interface admin
    private function visibleProduct(){
        return Product::where('isVisible',1);
    }

    public function all(){
        //retourne tous les produits
        $products = $this->visibleProduct()->paginate(6);
        $categorie = Categorie::all();
        return view('welcome',compact(['products','categorie']));
    }

    public function isDiscount(){
        //retourne tous les produits en solde
        $products = $this->visibleProduct()->where('isDiscount',1)->paginate(6);
        $categorie = Categorie::all();
        return view('welcome',compact(['products','categorie']));
    }

    public function sortByCategorie($id){
        //trie les produit par categorie
        $products = $this->visibleProduct()->where('category_id',$id)->paginate(6);
        $categorie = Categorie::all();
        return view('welcome',compact(['products','categorie']));
    }

    public function show($id){
        //affiche un produit
        $product = Product::find($id);
        $categorie = Categorie::all();
        return view('show',compact(['product','categorie']));
    }

}
