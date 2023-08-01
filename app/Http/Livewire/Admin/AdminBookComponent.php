<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Book;
use Livewire\WithPagination;

class AdminBookComponent extends Component
{
    use WithPagination;


    public function deleteBook($id)
    {
        $book=Book::find($id);
        $book->delete();
        session()->flash('message','Book has been deleted successfully!');

    }

    public function render()
    {
        $books=Book::paginate(5);
        return view('livewire.admin.admin-book-component',['books'=>$books])->layout('layouts.master');
    }
}
