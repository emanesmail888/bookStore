<?php

namespace App\Http\Livewire\Admin;

use App\Models\BookAttribute;
use Livewire\Component;

class AdminAttributesComponent extends Component
{
    public function render()
    {
        $attributes=BookAttribute::paginate(10);
        return view('livewire.admin.admin-attributes-component',['attributes'=>$attributes])->layout('layouts.master');
    }

    public function deleteAttribute($attribute_id)
    {
        $battribute=  BookAttribute::find($this->attribute_id);
        $battribute->delete();
        session()->flash('message','Attribute has been deleted successfully !');



    }
}
