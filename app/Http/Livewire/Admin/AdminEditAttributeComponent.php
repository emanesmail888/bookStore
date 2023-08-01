<?php

namespace App\Http\Livewire\Admin;

use App\Models\BookAttribute;
use Livewire\Component;

class AdminEditAttributeComponent extends Component
{
    public $name;
    public $attribute_id;


    public function mount($attribute_id){
        $battribute=BookAttribute::find($attribute_id);
        $this->attribute_id=$battribute->id;
        $this->name=$battribute->name;

    }
    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required'
        ]);

    }

    public function updateAttribute()
    {
        $this->validate([
            'name'=>'required'
        ]);
        $battribute=  BookAttribute::find($this->attribute_id);
        $battribute->name= $this->name;
        $battribute->save();
        session()->flash('message','Attribute has been updated successfully !');

    }
    public function render()
    {
        return view('livewire.admin.admin-edit-attribute-component')->layout('layouts.master');
    }
}
