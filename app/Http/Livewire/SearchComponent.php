<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
//  use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\WithPagination;

class SearchComponent extends Component
{
    use WithPagination;

    public $sorting;
    public $pageSize;
    public $search;
    public $book_cat;
    public $book_cat_id;


    public function mount()
    {
    $this->sorting="default";
     $this->pageSize=12 ;
     $this->fill(request()->only('search','book_cat','book_cat_id'));
   }

    public function render()
    {


        if ($this->sorting=='date') {
             $books=Book::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->book_cat_id.'%')->orderBy('created_at','desc')->paginate($this->pageSize);
        } else if ($this->sorting=='price') {
            $books = Book::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->book_cat_id.'%')->orderBy('price','asc')->paginate($this->pageSize);
        } else if ($this->sorting=='price-desc') {
            $books = Book::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->book_cat_id.'%')->orderBy('price','desc')->paginate($this->pageSize);
        } else {
            $books = Book::where('name','like','%'.$this->search.'%')->where('category_id','like','%'.$this->book_cat_id.'%')->paginate($this->pageSize);
        }



        $categories=Category::all();


        return view('livewire.search-component',['books'=>$books,'categories'=>$categories])->layout('layouts.master')->layout('layouts.master');
    }
    public function store($book_id)
    {
        $book = Book::findOrFail($book_id);
        Cart::add(
            $book->id,
            $book->name,
            1,
            $book->price,
            1,
            ['image' => $book->image],


        );

        session()->flash("success_message","Item Add In Cart");
        return redirect()->route('book.cart');
    }
}

