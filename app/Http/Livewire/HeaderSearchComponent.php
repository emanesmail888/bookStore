<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class HeaderSearchComponent extends Component
{

    public $search;
    public $book_cat;
    public $book_cat_id;

    public function mount(){
        $this->book_cat='All Category';
        $this->fill(request()->only('search','book_cat','$book_cat_id'));

    }
    public function render()
    {
        $categories=Category::all();
        return view('livewire.header-search-component',['categories'=>$categories])->layout('layouts.master');;
    }
}
