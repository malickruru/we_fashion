<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * afficher la liste des produits
     */
    public function index()
    {
        // récuperer 20 produits par page
        $products = Product::paginate(20);
        return view('admin.product_list', compact('products'));
    }

    /**
     * retourne le formulaire de creation de produit
     */
    public function create()
    {
        $categories = Categorie::all();
        $sizes = Size::all();
        return view('admin.product_add',compact(['categories','sizes']));
    }

    /**
     * enregistrer le produit en base de donnée
     */
    public function store(Request $request)
    {

        // enregistrer l'image sur le serveur
        $fichierLP = $request->file('image');
        $fileNameLP = "";
        if ($request->hasfile('image')) {
            $extensionLP = $fichierLP->getClientOriginalName();
            $fileNameLP = 'image/' . time() . '_' . $extensionLP;
            $fichierLP->move(public_path('image/'), $fileNameLP);
        }

        // créer un produits
        $product = Product::create([
            'name' => $request->name, 
            'description' => $request->description, 
            'price' => $request->price, 
            'isVisible' => $request->isVisible, 
            'isDiscount' => $request->isDiscount, 
            'reference' => $request->reference, 
            'category_id' => $request->category_id, 
            'image' => $fileNameLP, 
        ]);

        // lier le produit à des taille
        foreach ($request->size as $sizeId) {
            $product->sizes()->attach($sizeId);
        }
        

        return redirect()->back()->with('success', 'le produit '.$request->name.' a été ajouter avec succès')->withInput();

        
    }

    

    /**
     * retourne le formulaire d'edition de produit
     */
    public function edit(Request $request)
    {
        $product = Product::find($request->id);
        $categories = Categorie::all();
        $sizes = Size::all();
        return view('admin.product_edit', compact(['product','categories','sizes']));
    }

    /**
     * Mettre à jour un produit
     */
    public function update(Request $request)
    {
        $product = Product::find($request->id);
        // enregistrer l'image sur le serveur
        $fichierLP = $request->file('image');
        $fileNameLP = $product->image ;
        if ($request->hasfile('image')) {
            $extensionLP = $fichierLP->getClientOriginalName();
            $fileNameLP = 'image/products/' . time() . '_' . $extensionLP;
            $fichierLP->move(public_path('image/products/'), $fileNameLP);
        }

        // créer un produit
        $product->update([
            'name' => $request->name, 
            'description' => $request->description, 
            'price' => $request->price, 
            'isVisible' => $request->isVisible, 
            'isDiscount' => $request->isDiscount, 
            'reference' => $request->reference, 
            'category_id' => $request->category_id, 
            'image' => $fileNameLP, 
        ]);

        // mettre à jour les relation entre produits et tailles
        foreach (Size::all() as $size) {
            if(in_array($size->id, $request->size)){
                $product->sizes()->attach($size->id);
            }else{
                $product->sizes()->detach($size->id);
            }
            
        }

        return redirect()->back()->with('success', 'le produit '.$request->name.' a été mis à jour avec succès')->withInput();

    }

    /**
     * Supprimer un produit
     */
    public function destroy(Request $request)
    {
        $product = Product::find($request->id);

        
        // suprimer toutes les liaisons de ce produit dans la table pivot
        $product->sizes()->detach();

        $product->delete(); 
        return redirect()->back()->with('error', 'le produit '.$product->name.' a été supprimé')->withInput();
    }
}
