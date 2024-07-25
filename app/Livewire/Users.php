<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    public function render()
    {
        $users = User::with('roles')->paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.users', [
            'users' => $users
        ]);
    }
}
