<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
//  use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\WithPagination;

class ShopComponent extends Component
{
    use WithPagination;
    // public $sort = [
    //     1 => 'default',
    //     2 => 'date',
    //     3 => 'price',
    //     4 => 'price_desc'
    // ];

    public $sorting;
    public $pageSize;
    public $min_price;
    public $max_price;


    public function mount()
    {

        $this->sorting = "default";
        $this->pageSize = 12;
        $this->min_price = 1;
        $this->max_price = 1000;
    }

    //    public function changeEvent()
    //    {
    //        $this->sorting = "default";
    //    }
    public function render()
    {

        if ($this->sorting =='date') {
            $books = Book::whereBetween('price', [$this->min_price, $this->max_price])->orderBy('created_at', 'desc')->paginate($this->pageSize);
        } elseif ($this->sorting =='price') {
            $books = Book::whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'asc')->paginate($this->pageSize);
        } elseif ($this->sorting =='price-desc') {
            $books = Book::whereBetween('price', [$this->min_price, $this->max_price])->orderBy('price', 'desc')->paginate($this->pageSize);
        } else {
            $books = Book::whereBetween('price', [$this->min_price, $this->max_price])->paginate($this->pageSize);
        }



        $categories = Category::all();
        $popular_books = Book::inRandomOrder()->limit(8)->get();



        return view('livewire.shop-component', ['books' => $books, 'categories' => $categories,'popular_books'=>$popular_books])->layout('layouts.master')->layout('layouts.master');
    }

    public function addToWishlist($book_id, $book_name, $book_price)
    {


        Cart::instance('wishlist')->add($book_id, $book_name, 1, $book_price)->associate('App\Models\Book');
        $this->emitTo('wishlist-count-component', 'refreshComponent');
    }
    public function store($book_id, $book_name, $book_price)
    {


        Cart::instance('cart')->add($book_id, $book_name, 1, $book_price)->associate('App\Models\Book');
        $this->emitTo('cart-count-component', 'refreshComponent');
        Session()->flash('success', 'Item Added In Cart');
        return redirect()->route('book.cart');
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
}
