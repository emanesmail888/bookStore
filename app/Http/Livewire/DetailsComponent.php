<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\OrderItem;
use App\Models\Sale;
use Gloudemans\Shoppingcart\Facades\Cart;
//  use Cart ;
// use Gloudemans\Shoppingcart\Cart as ShoppingcartCart;
// use Gloudemans\Shoppingcart\Facades\Cart as FacadesCart;

class DetailsComponent extends Component
{

    public $slug;
    public $qty;
    public $satt=[];


    public function mount($slug)
    {
        $this->slug = $slug;
        $this->qty = 1;
    }

    public function increaseQuantity()
    {
        $this->qty++;
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function decreaseQuantity()
    {
        if ($this->qty > 1) {
            $this->qty--;
        }
        $this->emitTo('cart-count-component', 'refreshComponent');
    }
    public function store($book_id, $book_name, $book_price)
    {

        Cart::instance('cart')->add($book_id, $book_name, $this->qty, $book_price,0,$this->satt)->associate('App\Models\Book');

        session()->flash("success_message", "Item Add In Cart");
        return redirect()->route('book.cart');
    }
    //     public function store($book_id)
    // {
    //     $book = Book::findOrFail($book_id);
    //     Cart::add(
    //         $book->id,
    //         $book->name,
    //         1,
    //         $book->price,
    //         1,
    //         ['image' => $book->image],


    //     );

    //     session()->flash("success_message","Item Add In Cart");
    //     return redirect()->route('book.cart');
    // }
    public function render()
    {
        $book = Book::where('slug', $this->slug)->first();
        $sale = Sale::find(1);
        $popular_books = Book::inRandomOrder()->limit(4)->get();
        $related_books = Book::where('category_id', $book->category_id)->inRandomOrder()->limit(5)->get();
        $orderItems = OrderItem::all();
        return view('livewire.details-component', ['book' => $book, 'sale' => $sale, 'popular_books' => $popular_books, 'related_books' => $related_books])->layout('layouts.master');
    }
}
