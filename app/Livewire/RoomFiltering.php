<?php

namespace App\Livewire;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class RoomFiltering extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $rooms = Room::where('room_id', 'like', "%{$this->search}%")
            ->orWhere('name', 'like', "%{$this->search}%")
            ->orWhere('type', 'like', "%{$this->search}%")
            ->orWhere('capacity', 'like', "%{$this->search}%")
            ->orWhere('require_deposit', 'like', "%{$this->search}%")
            ->orWhere('deposit_cost', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.roomfiltering', compact('rooms'));
    }
}