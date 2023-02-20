<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Ce controller regrouper toutes les méthodes pour gérer un panier
    // ces méthodes ne sont accessible qu'aux utilisateurs connectés

    // 1.cette méthode crée une variable de session  pour stocker le panier
    // cette variable est unique pour chaque utilisateur
    private function initCart()
    {
        session(['panier_' . Auth::user()->id => []]);
    }

    //2. Cette méthode récupère le contenu du panier à partir de la variable de session, 
    // et si la variable de session n'existe pas,
    //  elle initialise le panier en le définissant comme un tableau vide.
    //   Enfin, elle renvoie le contenu du panier à la vue cart.

    public function showCart()
    {
        $cart = session('panier_' . Auth::user()->id);

        if (!$cart) {
            $cart = [];
        }
        // appeler la méthode getCartItemTotals pour récupérer le prix total (quantité * prix ) de chaque produit
        $itemTotals = $this->getCartItemTotals($cart);

        // appeler la méthode getCartTotal pour récupérer le prix total du panier
        $cartTotal = $this->getCartTotal($cart);

        $categorie = Categorie::all();
        
    return view('cart', ['cart' => $cart, 'itemTotals' => $itemTotals, 'cartTotal' => $cartTotal, 'categorie' => $categorie]);

}

    // 3.La méthode commence par vérifier si la variable de session existe. 
    // Si elle n'existe pas, elle appelle la méthode initCart pour initialiser le panier.
    // Ensuite, elle récupère le contenu du panier à partir de la variable de session 
    // et cherche l'indice de l'élément correspondant à l'id du produit. Si l'élément est trouvé, 
    // la quantité est incrémentée avec celle passée en paramètre. 
    // Sinon, un nouvel élément est ajouté au tableau avec les données passées en paramètre.
    // Enfin, la méthode met à jour la variable de session avec le nouveau contenu du panier et
    // redirige l'utilisateur vers la page précédente avec un message de succès.

    public function addToCart($id, $price, $quantity)
    {
       

        if (!session('panier_' . Auth::user()->id)) {
            $this->initCart();
        }

        $cart = session('panier_' . Auth::user()->id);
        $itemIndex = -1;

        // Vérifier si le produit est déjà présent dans le panier
        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                $itemIndex = $index;
                break;
            }
        }

        // Si le produit est déjà présent dans le panier, incrémenter la quantité
        if ($itemIndex != -1) {
            $cart[$itemIndex]['quantity'] += $quantity;
        }
        // Sinon, ajouter le produit au panier
        else {
            $item = [
                'id' => $id,
                'price' => $price,
                'quantity' => $quantity,
                'option' => Product::find($id),
            ];
            array_push($cart, $item);
        }

        session(['panier_' . Auth::user()->id => $cart]);

        return redirect()->back()->with('success', 'Le produit a été ajouté au panier.');
    }

    // 4.La méthode récupère le contenu du panier à partir de la variable de session et recherche 
    // l'indice de l'élément correspondant à l'id du produit. Si l'élément est trouvé, 
    // il est supprimé avec la fonction unset(). 
    // Enfin, la méthode met à jour la variable de session avec le nouveau contenu du panier et 
    // redirige l'utilisateur vers la page précédente avec un message de succès.

    public function removeFromCart($id)
    {
        $cart = session('panier_' . Auth::user()->id);

        // Vérifier si le produit est présent dans le panier
        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                unset($cart[$index]);
                break;
            }
        }

        session(['panier_' . Auth::user()->id => $cart]);

        return redirect()->back()->with('error', 'Le produit a été retiré du panier.');
    }

    // 5 . la méthode récupère le contenu du panier à partir de la variable de session et 
    // recherche l'indice de l'élément correspondant à l'id du produit.
    //  Si l'élément est trouvé, sa quantité est mise à jour avec la nouvelle quantité passée en paramètre.
    //  Enfin, la méthode met à jour la variable de session avec le nouveau contenu du panier et 
    // redirige l'utilisateur vers la page précédente avec un message de succès. 

    public function updateQuantity($id, Request $request)
    {

        $cart = session('panier_' . Auth::user()->id);

        // Rechercher l'élément correspondant à l'id du produit
        foreach ($cart as $index => $item) {
            if ($item['id'] == $id) {
                $cart[$index]['quantity'] = $request->newQuantity;
                break;
            }
        }

        session(['panier_' . Auth::user()->id => $cart]);

        return redirect()->back()->with('success', 'La quantité du produit a été mise à jour.');
    }

    // 6. La méthode commence par mettre à jour la variable de session avec un tableau vide 
    // pour le panier de l'utilisateur actuel. Ensuite,
    //  elle redirige l'utilisateur vers la page précédente avec un message de succès.

    public function clearCart()
    {
        session(['panier_' . Auth::user()->id => []]);

        return redirect()->back()->with('error', 'Le panier a été vidé.');
    }

    // 7.La méthode prend en paramètre le contenu du panier,
    // récupéré depuis la variable de session.
    // Elle parcourt chaque élément du panier et calcule le prix total du produit en multipliant la quantité par le prix unitaire. 
    // Le résultat est stocké dans un tableau associatif avec l'id du produit comme clé.

    private function getCartItemTotals($cart)
    {
        $itemTotals = [];

        foreach ($cart as $item) {
            $itemTotals[$item['id']] = $item['quantity'] * $item['price'];
        }

        return $itemTotals;
    }

    // 8. La méthode prend en paramètre le contenu du panier, récupéré depuis la variable de session. 
    // Elle parcourt chaque élément du panier et ajoute le prix total du produit (quantité * prix unitaire) 
    // au total du panier. Le résultat est retourné en tant que valeur numérique.

    private function getCartTotal($cart)
    {
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['quantity'] * $item['price'];
        }

        return $total;
    }
}
