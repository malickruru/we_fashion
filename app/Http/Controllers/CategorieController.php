<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;


class CategorieController extends Controller
{
    /**
     * afficher la liste des produits
     */
    public function index() 
    {
        $categories = Categorie::all();
        return view('admin.categorie_list', compact('categories'));
    }

    /**
     * retourne le formulaire de creation de categorie
     */
    public function create() 
    {
        return view('admin.categorie_add');
    }

    /**
     * enregistrer la catégorie en base de donnée
     */
    public function store(Request $request) 
    {
        Categorie::create([
            'name' => $request->name, 
        ]);
        
        return redirect()->back()->with('success', 'la catégorie '.$request->name.' a été ajouter avec succès')->withInput();

    }

    /**
     * retourne le formulaire d'edition de categorie
     */
    public function edit(Request $request) 
    {
        $categorie = Categorie::find($request->id);
        return view('admin.categorie_edit', compact('categorie'));

    }

    /**
     * Mettre à jour une categorie
     */
    public function update(Request $request) 
    {
        $categorie = Categorie::find($request->id);
        $categorie->update([
            'name' => $request->name
        ]);
        return redirect()->back()->with('success', 'la catégorie '.$request->name.' a été mis à jour avec succès')->withInput();

    }

    /**
     * Suprimmer une categorie
     */
    public function destroy(Request $request) 
    {
        $categorie = Categorie::find($request->id);
        $categorie->delete(); 
        return redirect()->back()->with('error', 'la catégorie '.$categorie->name.' ainsi que tous les produits associés ont été supprimé')->withInput();
    
    }
}
