<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Gloudemans\Shoppingcart\Facades\Cart;


class WishlistComponent extends Component
{
    public function render()
    {
        return view('livewire.wishlist-component')->layout('layouts.master');
    }
    public function removeFromWishlist($book_id)
    {

        foreach (Cart::instance('wishlist')->content() as $witem) {
            if ($witem->id == $book_id) {
                Cart::instance('wishlist')->remove($witem->rowId);

                $this->emitTo('wishlist-count-component', 'refreshComponent');
                return;
            }
        }
    }
    public function moveBookFromWishlistToCart($rowId){
        $item= Cart::instance('wishlist')->get($rowId);
        Cart::instance('wishlist')->remove($rowId);
        Cart::instance('cart')->add($item->id,$item->name,1,$item->price)->associate('App\Models\Book');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
        $this->emitTo('cart-count-component', 'refreshComponent');





    }
}
