<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\HomeCategory;
use Livewire\Component;

class AdminHomeCategoryComponent extends Component
{
    public $selected_categories=[];
    public $numberOfBooks;
    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-home-category-component',['categories'=>$categories])->layout('layouts.master');
    }
    public  function mount(){
        $category=HomeCategory::find(1);
        $this->selected_categories=explode(',',$category->sel_categories);
        $this->numberOfBooks=$category->no_of_books;
    }
    public  function updateHomeCategory(){
        $category=HomeCategory::find(1);
        $category->sel_categories=implode(',',$this->selected_categories);
        $category->no_of_books=$this->numberOfBooks;
        $category->save();
        session()->flash('message','HomeCategory has been updated successfully');
    }

}
