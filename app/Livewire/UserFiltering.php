<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
class UserFiltering extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $users = User::where('user_id', 'like', "%{$this->search}%")
            ->orWhere('first_name', 'like', "%{$this->search}%")
            ->orWhere('second_name', 'like', "%{$this->search}%")
            ->orWhere('phone_number', 'like', "%{$this->search}%")
            ->orWhere('credit', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.userfiltering', compact('users'));
    }
}