<?php

namespace App\Http\Livewire\Admin;

use App\Models\BookAttribute;
use Livewire\Component;

class AdminAddAttributeComponent extends Component
{
     public $name;
    public function render()
    {
        return view('livewire.admin.admin-add-attribute-component')->layout('layouts.master');
    }

    public function updated($fields){
        $this->validateOnly($fields,[
            'name'=>'required'
        ]);

    }

    public function storeAttribute(){
        $this->validate([
            'name'=>'required'
        ]);
        $battribute= new BookAttribute();
        $battribute->name= $this->name;
        $battribute->save();
        session()->flash('message','Attribute has been added successfully !');
    }
}
