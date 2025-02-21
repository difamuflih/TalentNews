<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    
    // public $confirmingUserDeletion = false;
    public function render()
    {
        $users = User::with('roles')->paginate(10);
        // $categories = Category::where('user_id', auth()->user()->id)->paginate(10);

        return view('livewire.users', [
            'users' => $users
        ]);
    }

    public function confirmUserDeletion( User $user)
    {
        $user->delete();
        // $this->confirmingUserDeletion = $id;
    }

    // public function deleteUser( User $user)
    // {
    //     $user->delete();
    //     $this->confirmingUserDeletion = false;
    // }
}
