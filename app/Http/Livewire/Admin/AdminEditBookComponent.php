<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Book;
use App\Models\BookAttribute;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AdminEditBookComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $description;
    public $price;
    public $sale_price;
    public $stock_status;
    public $featured;
    public $image;
    public $quantity;
    public $category_id;
    public $newImage;
    public $book_id;
    public $scategory_id;
    public $attr;
    public $inputs;
    public $attribute_arr;
    public $attribute_values;

    public function render()
    {
        $categories=Category::all();
        $scategories=Subcategory::where('category_id',$this->category_id)->get();
        $battributes=BookAttribute::all();


        return view('livewire.admin.admin-edit-book-component',['categories'=>$categories,'scategories'=>$scategories,'battributes'=>$battributes])->layout('layouts.master');
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }
    public function mount($book_slug)
    {
        $book=Book::where('slug',$book_slug)->first();
        $this->name=$book->name;
        $this->slug=$book->slug;
        $this->description=$book->description;
        $this->price=$book->price;
        $this->sale_price=$book->sale_price;
        $this->stock_status=$book->stock_status;
        $this->featured=$book->featured;
        $this->quantity=$book->quantity;
        $this->image=$book->image;
        $this->category_id=$book->category_id;
        $this->scategory_id=$book->scategory_id;
        $this->book_id=$book->id;
        $this->inputs=$book->attributeValues->where('book_attribute_id',$book->id)->unique('attribute_id')->pluck('attribute_id');
        $this->attribute_arr=$book->attributeValues->where('book_attribute_id',$book->id)->unique('attribute_id')->pluck('attribute_id');
        foreach ($this->attribute_arr as $a_rr ) {
            $allAttributeValue=AttributeValue::where('book_attribute_id',$book->id)->where('attribute_id',$a_rr)->get()->pluck('value');
            $valueString='';
            foreach ($allAttributeValue as  $value) {
                $valueString=$valueString.$value.',';

            }
            $this->attribute_values[$a_rr]=rtrim($valueString,",");
        }
    }

    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }


    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'sale_price'=>'numeric',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required',
            'image'=>'required',

        ]);

    }

    public function updateBook()
    {
        $this->validate([
            'name'=>'required',
            'slug'=>'required',
            'description'=>'required',
            'price'=>'required|numeric',
            'sale_price'=>'numeric',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required',
            'image'=>'required',

        ]);
        $book=Book::find($this->book_id);
        $book->name=$this->name;
        $book->slug=$this->slug;
        $book->description=$this->description;
        $book->price=$this->price;
        $book->sale_price=$this->sale_price;
        $book->stock_status=$this->stock_status;
        $book->featured=$this->featured;
        $book->quantity=$this->quantity;
        if($this->newImage)
        {
            $imageName=Carbon::now()->timestamp.'.'.$this->newImage->getClientOriginalName();
            $this->newImage->storeAs('books',$imageName);
            $book->image=$imageName;
         }
        $book->category_id=$this->category_id;
        if($this->scategory_id)
        {
            $book->subcategory_id=$this->scategory_id;
        }
         $book->save();
         AttributeValue::where('book_attribute_id',$book->id)->delete();
         foreach ($this->attribute_values as $key => $attribute_value) {
            $avalues=explode(",",$attribute_value);
            foreach ($avalues as  $avalue) {
               $attr_value=new AttributeValue();
               $attr_value->attribute_id=$key;
               $attr_value->value=$avalue;
               $attr_value->book_attribute_id=$book->id;
               $attr_value->save();

            }
       }

        session()->flash('message','Book has been updated successfully');
        $this->name="";
        $this->slug="";
        $this->description="";
        $this->quantity="";
        $this->featured="";
        $this->price="";
        $this->sale_price="";
        $this->stock_status="";
    }


    public function add(){
        if(!$this->attribute_arr->contains($this->attr))
        {
            $this->inputs->push($this->attr);
            $this->attribute_arr->push($this->attr);
        }
    }

    public function remove($attr)
    {
        unset($this->inputs[$attr]);
    }
}
