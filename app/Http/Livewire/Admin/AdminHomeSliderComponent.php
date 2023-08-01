<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;

class AdminHomeSliderComponent extends Component
{
    public function render()
    {
        $sliders=HomeSlider::paginate(5);
        return view('livewire.admin.admin-home-slider-component',['sliders'=>$sliders])->layout('layouts.master');
    }
    public function deleteSlide($slide_id){
        $slider=HomeSlider::find($slide_id);
        $slider->delete();
        Session()->flash('message','Slider has been deleted successfully');
    }
}
