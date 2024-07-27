<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class NewsAdmin extends Component
{
    use WithPagination;

    public $news = [
        'title' => '',
        'news' => '',
        'category' => ''
    ];



    protected $rules = [
        'news.title' => "Required|string|max:255",
        'news.news' => "Required|string",
        'news.category' => "Required",
        // 'news.photo' => "Required|png,svg,jpg|min:4",
    ];

    public function render()
    {
        $showNews = News::with('categories')->paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.news-admin', [
            'showNews' => $showNews
        ]);
    }


    public function confirmNewsDeletion( News $news)
    {
        $news->delete();
        // $this->confirmingUserDeletion = $id;
    }

    public function addNews(){
        $validatedData = $this->validate();

        $slug = Str::slug($validatedData['news']['title']);
        $photo = Str::slug($validatedData['news']['title']);

        News::create([
            'title' => $this->news['title'],
            'news' => $this->news['news'],
            'category_id' => $this->news['category'],
            'slug' => $slug,
            'photo' => $photo,
            'user_id' => Auth::id(),
        ]);

        $this->reset('news');
    }
}
