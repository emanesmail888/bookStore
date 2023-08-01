<?php

namespace App\Http\Livewire\Admin;

use App\Models\HomeSlider;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Category;
use App\Models\Subcategory;
use Carbon\Carbon;

class AdminEditCategoryComponent extends Component
{
    use WithFileUploads;
    public $category_slug;
    public $category_id;
    public $name;
    public $slug;
    public $image;
    public $newImage;
    public $scategory_id;
    public $scategory_slug;

    public function render()
    {
        $categories=Category::all();
        return view('livewire.admin.admin-edit-category-component',['categories'=>$categories])->layout('layouts.master');
    }


    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }

    public function mount($category_slug,$scategory_slug=null){
        if($scategory_slug)
        {
        $this->scategory_slug=$scategory_slug;
        $scategory=Subcategory::where('slug',$scategory_slug)->first();
        $this->scategory_id=$scategory->id;
        $this->category_id=$scategory->category_id;
        $this->name=$scategory->name;
        $this->slug=$scategory->slug;
        $this->image=$scategory->image;


        }
        else{
        $this->category_slug=$category_slug;
        $category=Category::where('slug',$category_slug)->first();
        $this->category_id=$category->id;
        $this->name=$category->name;
        $this->slug=$category->slug;
        $this->image=$category->image;
        }

    }


    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'image'=>'required',

        ]);

    }
    public function updateCategory(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:categories',
            'image'=>'required',

        ]);
        if($this->scategory_id)
        {
            $scategory=Subcategory::find($this->scategory_id);
            $scategory->name=$this->name;
            $scategory->slug=$this->slug;
            $scategory->category_id=$this->category_id;
            if($this->newImage)
            {
                $imageName=Carbon::now()->timestamp.'.'.$this->newImage->getClientOriginalName();
                $this->newImage->storeAs('categories',$imageName);
                $scategory->image=$imageName;
             }

            $scategory->save();

        }
        else{


        $category=Category::find($this->category_id);
        $category->name=$this->name;
        $category->slug=$this->slug;
        if($this->newImage)
            {
                $imageName=Carbon::now()->timestamp.'.'.$this->newImage->getClientOriginalName();
                $this->newImage->storeAs('categories',$imageName);
                $category->image=$imageName;
             }

        $category->save();
            }
        session()->flash('message','Category has been updated');
        $this->name="";
        $this->slug="";
        $this->image="";
    }




}
