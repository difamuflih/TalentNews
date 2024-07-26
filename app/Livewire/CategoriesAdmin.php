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

    // public $category;
    public $category = [
        'name' => '',
        'icon' => '',
    ];


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

    public function store(Request $request)
    {
        //
        $validated = $request->validate([
        'category' => "Required|string|min:4",
        'icon' => "Required|png,svg,jpg|min:4",
        ]);

        DB::transaction();

        try{
            if($request->hasFile('icon')){
                $iconPath = $request->file('icon')->strore('category_icons', 'public');
                $validated['icon'] = $iconPath;
            }
            $validated['slug'] = Str::slug($request->category);
            $newCategory = Category::create($validated);

            DB::commit();

            return redirect()->route('admin.category');
        } catch(\Exception $e){
            DB::rollBack();
            $error = ValidationException::withMessages([
                'system_error' => ['System error!' . $e->getMessage()],
            ]);
            throw $error;
        }
        
    }

}
