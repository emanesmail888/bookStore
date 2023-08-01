<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;
use App\Models\HomeSlider;
use App\Models\Category;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditHomeSliderComponent extends Component
{

    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;
    public $newImage;
    public $slider_id;
    public function mount($slide_id){
        $slider=HomeSlider::find($slide_id);
        $this->title=$slider->title;
        $this->subtitle=$slider->subtitle;
        $this->price=$slider->price;
        $this->link=$slider->link;
        $this->status=$slider->status;

        $this->image=$slider->image;
        $this->slider_id=$slider->id;
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-home-slider-component')->layout('layouts.master');
    }


    public function updateSlide()
    {
        $slider=HomeSlider::find($this->slider_id);
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $slider->status=$this->status;

        if($this->newImage)
        {
            $imageName=Carbon::now()->timestamp.'.'.$this->newImage->getClientOriginalName();
            $this->newImage->storeAs('sliders',$imageName);
            $slider->image=$imageName;
         }
        $slider->save();
        session()->flash('message','slide has been updated successfully');
        $this->title="";
        $this->subtitle="";
        $this->price="";
        $this->link="";
        $this->status="";
    }


}
