<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Symfony\Contracts\Service\Attribute\Required;

class CategoriesAdmin extends Component
{
    use WithPagination;

    public $showModal = false;
    public $category = [
        'category' => '',
        'about' => '',
    ];

    protected $rules = [
        'category.category' => "Required|string|max:25",
        'category.about' => "Required|string|max:255",
        // 'category.icon' => "Required|png,svg,jpg|min:4",
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

    // public function showingModal(){
    //     $this->showModal = true;
    // }

    public function addCategory(){
        $validatedData = $this->validate();

        $slug = Str::slug($validatedData['category']['category']);

        Category::create([
            'category' => $this->category['category'],
            'about' => $this->category['about'],
            'slug' => $slug,
            // 'icon' => $this->category['icon'],
        ]);

        $this->reset('category');
        // $this->showModal = false;
    }

}
