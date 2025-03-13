<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Booking
                            @can('view rooms')
                                <a  class="btn btn-primary float-end" href="{{ url('rooms')}}">Back to rooms</a>
                            @endcan
                            @can('view bookings')
                                <a  class="btn btn-primary float-end" href="{{ url('bookings')}}">Back to bookings</a>
                            @endcan
                        </h2>
                    </div>
                    <div class="card-body">
                        <x-input-label for="name" :value="__('You are booked into this room on the '.$bookings->date)" />

                        <br>
                        <h1 class="mb-2 ">Room Information</h1>
                        <x-input-label for="name" :value="__('Room Name --- '.$room->name)" />
                        <x-input-label for="name" :value="__('Room Type --- '.$room->type)" />
                        <x-input-label for="name" :value="__('Room Capacity --- '.$room->capacity)" />
                        <x-input-label for="name" :value="__('Does Room require Deposit? --- '.$room->require_deposit)" />
                        <x-input-label for="name" :value="__('Room Deposit Cost --- '.$room->deposit_cost)" />
                        <x-input-label for="name" :value="__('Date and Time Booked --- '.$bookings->date)" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>