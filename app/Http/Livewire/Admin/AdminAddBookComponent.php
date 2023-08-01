<?php

namespace App\Http\Livewire\Admin;

use App\Models\AttributeValue;
use App\Models\Category;
use App\Models\Book;
use App\Models\BookAttribute;
use App\Models\Subcategory;
use Carbon\Carbon;

use Illuminate\Support\Str;

use Livewire\Component;
use Livewire\WithFileUploads;

class AdminAddBookComponent extends Component
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
    public $scategory_id;
    public $attr;
    public $inputs=[];
    public $attribute_arr=[];
    public $attribute_values;

    public function render()
    {
        $categories=Category::all();
        $scategories=Subcategory::where('category_id',$this->category_id)->get();
        $battributes=BookAttribute::all();

        return view('livewire.admin.admin-add-book-component',['categories'=>$categories,'scategories'=>$scategories,'battributes'=>$battributes])->layout('layouts.master');
    }

    public function mount(){
        $this->stock_status='instock';
        $this->featured=0;
    }

    public function add(){
        if(!in_array($this->attr,$this->attribute_arr))
        {
            array_push($this->inputs,$this->attr);
            array_push($this->attribute_arr,$this->attr);
        }
    }

    public function remove($attr)
    {
        unset($this->inputs[$attr]);
    }

    public function generateSlug(){
        $this->slug=Str::slug($this->name,'-');
    }
    public function changeSubcategory()
    {
        $this->scategory_id=0;
    }

    public function updated($fields){

        $this->validateOnly($fields,[
            'name'=>'required',
            'slug'=>'required|unique:books',
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

    public function storeBook(){
        $this->validate([
            'name'=>'required',
            'slug'=>'required|unique:books',
            'description'=>'required',
            'price'=>'required|numeric',
            'sale_price'=>'numeric',
            'stock_status'=>'required',
            'featured'=>'required',
            'quantity'=>'required|numeric',
            'category_id'=>'required',
            'image'=>'required',

        ]);
        $book=new Book();
        $book->name=$this->name;
        $book->slug=$this->slug;
        $book->description=$this->description;
        $book->price=$this->price;
        $book->sale_price=$this->sale_price;
        $book->stock_status=$this->stock_status;
        $book->featured=$this->featured;
        $book->quantity=$this->quantity;
        $imageName=Carbon::now()->timestamp.'.'.$this->image->getClientOriginalName();
        $this->image->storeAs('books',$imageName);
        $book->image=$imageName;
        $book->category_id=$this->category_id;
        if($this->scategory_id)
        {
            $book->subcategory_id=$this->scategory_id;
        }

        $book->save();
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
        session()->flash('message','Book has been created successfully');
        $this->name="";
        $this->slug="";
        $this->description="";
        $this->quantity="";
        $this->featured="";
        $this->price="";
        $this->sale_price="";
        $this->stock_status="";
    }
}
