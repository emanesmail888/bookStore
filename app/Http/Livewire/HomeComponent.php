<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Book;
use App\Models\Category;
use App\Models\Sale;
use App\Models\HomeCategory;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $lbooks=Book::orderBy('created_at','DESC')->get()->take(8);
        $sbooks=Book::where('sale_price','>',0)->inRandomOrder()->get()->take(8);
        $category=HomeCategory::find(1);
        $cats=explode(',',$category->sel_categories);
        $categories=Category::whereIn('id',$cats)->get();
        $sliders=HomeSlider::where('status',1)->get();
        $no_of_books=$category->no_of_books;
        $sale=Sale::find(1);

        return view('livewire.home-component',['lbooks'=>$lbooks,'sbooks'=>$sbooks,'sale'=>$sale,'categories'=>$categories,'sliders'=>$sliders,'no_of_books'=>$no_of_books])->layout('layouts.master');
    }
}
