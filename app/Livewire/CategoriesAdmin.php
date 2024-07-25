<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriesAdmin extends Component
{
    use WithPagination;

    public $item;

    public $confirmingCategoryAdd = false;

    protected $rules = [
        'category.category' => "Required|string|min:4",
        'category.icon' => "Required|png,svg,jpg|min:4",
    ];
    
    public function render()
    {
        $categories = Category::paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.categories-admin', [
            'categories' => $categories
        ]);
    }
    
    public function confirmCategoryDeletion( Category $category)
    {
        $category->delete();
        // $this->confirmingUserDeletion = $id;
    }
    
    public function confirmCategoryAdd()
    {

        $this->reset(['item']);
        $this->confirmingCategoryAdd = true;
    }

    public function saveCategory(){
        $this->validate();

        Category::create([
            'category' => $this->category['category'],
            'icon' => $this->category['icon'],
        ]);

        $this->confirmingCategoryAdd = false;

        
    }


    


}
