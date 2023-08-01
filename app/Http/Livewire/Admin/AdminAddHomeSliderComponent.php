<?php
namespace App\Http\Livewire\Admin;
use App\Models\Category;
use App\Models\Book;
use App\Models\HomeSlider;
use Carbon\Carbon;

use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddHomeSliderComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $price;
    public $link;
    public $status;
    public $image;

    public function render()
    {
        $sliders=HomeSlider::all();

    return view('livewire.admin.admin-add-home-slider-component',['sliders'=>$sliders])->layout('layouts.master');
    }

    public function mount(){
        $this->status=0;
    }




    public function addSlide(){
        $slider=new HomeSlider();
        $slider->title=$this->title;
        $slider->subtitle=$this->subtitle;
        $slider->price=$this->price;
        $slider->link=$this->link;
        $slider->status=$this->status;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->getClientOriginalName();
        $this->image->storeAs('sliders',$imageName);
        $slider->image=$imageName;

        $slider->save();
        session()->flash('message','slide has been created successfully');
        $this->title="";
        $this->subtitle="";
        $this->price="";
        $this->status="";
    }
}
