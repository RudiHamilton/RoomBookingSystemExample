<?php

namespace App\Livewire;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingFiltering extends Component

{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage(); // Reset to the first page when searching
    }

    public function render()
    {
        $bookings = Booking::where('booking_id', 'like', "%{$this->search}%")
            ->orWhere('user_id', 'like', "%{$this->search}%")
            ->orWhere('room_id', 'like', "%{$this->search}%")
            ->orWhere('date', 'like', "%{$this->search}%")
            ->orWhere('hoursRoomBooked', 'like', "%{$this->search}%")
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('livewire.bookingfiltering', compact('bookings'));
    }
}

