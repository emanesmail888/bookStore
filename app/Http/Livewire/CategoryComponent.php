<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
use App\Models\Subcategory;
//  use Gloudemans\Shoppingcart\Facades\Cart;
use Gloudemans\Shoppingcart\Facades\Cart;

use Livewire\WithPagination;

class CategoryComponent extends Component
{
    use WithPagination;
    public $sorting;
    public $pageSize;
    public $category_slug;
    public $scategory_slug;


    public function mount($category_slug,$scategory_slug=null)
    {
     $this->sorting= "default";
     $this->pageSize= 12 ;
     $this->category_slug=$category_slug ;
     $this->scategory_slug=$scategory_slug ;
   }
    public function render()
    {
        $category_id=null;
        $category_name="";
        $filter="";
        if($this->scategory_slug)
        {
            $scategory=Subcategory::where('slug',$this->scategory_slug)->first();
            $category_id=$scategory->id;
            $category_name=$scategory->name;
            $filter="sub";
        }
        else{
        $category=Category::where('slug',$this->category_slug)->first();
        $category_id=$category->id;
        $category_name=$category->name;
        $filter="";

        }
        if ($this->sorting == 'date') {
            $books = Book::where($filter.'category_id',$category_id)->orderBy('created_at', 'desc')->paginate($this->pageSize);
        } elseif ($this->sorting == 'price') {
            $books = Book::where($filter.'category_id',$category_id)->orderBy('price', 'asc')->paginate($this->pageSize);
        } elseif ($this->sorting == 'price-desc') {
            $books =Book::where($filter.'category_id',$category_id)->orderBy('price', 'desc')->paginate($this->pageSize);
        } else {
            $books = Book::where($filter.'category_id',$category_id)->paginate($this->pageSize);
        }


        // if ($this->sorting =='date') {
        //     $books=Book::where($filter.'category_id',$category_id)->orderBy('created_at','DESC')->paginate($this->pageSize);
        // } elseif ($this->sorting =='price') {
        //     $books=Book::where($filter.'category_id',$category_id)->orderBy('price','ASC')->paginate($this->pageSize);
        // } elseif ($this->sorting =='price_desc') {
        //     $books=Book::where($filter.'category_id',$category_id)->orderBy('price','DESC')->paginate($this->pageSize);
        // } else {
        //     $books=Book::where($filter.'category_id',$category_id)->paginate($this->pageSize);
        // }
        $categories=Category::all();
        $popular_books = Book::inRandomOrder()->limit(10)->get();



        return view('livewire.category-component',['books'=>$books,'categories'=>$categories,'category_name'=>$category_name,'category_id'=>$category_id,'popular_books'=>$popular_books])->layout('layouts.master')->layout('layouts.master');
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

