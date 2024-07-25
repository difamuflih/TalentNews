<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class CategoriesAdmin extends Component
{
    use WithPagination;
    public function render()
    {
        $categories = Category::paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.categories-admin', [
            'categories' => $categories
        ]);
    }
    

}
