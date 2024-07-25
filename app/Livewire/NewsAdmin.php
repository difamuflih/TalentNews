<?php

namespace App\Livewire;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;

class NewsAdmin extends Component
{
    use WithPagination;
    public function render()
    {
        $news = News::with('categories')->paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.news-admin', [
            'news' => $news
        ]);
    }

    public function confirmNewsDeletion( News $news)
    {
        $news->delete();
        // $this->confirmingUserDeletion = $id;
    }
}
