<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $categories = Category::where('slug', $slug)->with('news')->firstOrFail();
        
        // return view('user.category', compact('categories'));

        // Temukan kategori berdasarkan slug
        $categories = Category::where('slug', $slug)->firstOrFail();
        
        // Ambil semua berita terkait kategori ini
        $newsItems = $categories->news()->orderBy('created_at', 'desc')->get();

        // Kembalikan view dengan data kategori dan berita
        return view('user.category', compact('categories', 'newsItems'));
    }

    public function home()
    {
        $categories = Category::all(); // Mendapatkan 5 berita terbaru

        return view('user.home', compact('categories'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
