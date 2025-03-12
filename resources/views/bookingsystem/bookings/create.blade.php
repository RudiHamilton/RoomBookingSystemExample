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
                        <form action="{{url('bookings/store',with([$user->user_id,$room->room_id]))}}" method="POST">
                            @csrf
                            <x-input-label for="name" :value="__('You are booking a room under user: '.$user->first_name)" />
                            <x-input-label for="name" :value="__('You have £'.$user->credit.' of credit')" />
                            <br>
                            <h1 class="mb-2 ">Room Information</h1>
                            <x-input-label for="name" :value="__('Room Name --- '.$room->name)" />
                            <x-input-label for="name" :value="__('Room Type --- '.$room->type)" />
                            <x-input-label for="name" :value="__('Room Capacity --- '.$room->capacity)" />
                            <x-input-label for="name" :value="__('Does Room require Deposit? --- '.$room->require_deposit)" />
                            <x-input-label for="name" :value="__('Room Deposit Cost --- '.$room->deposit_cost)" />
                            <br>
                            <x-input-label for="name" :value="__('Select date and time of booking:')" />
                            <input name="date" class="date" type="date">
                            <input name="time" class="time" type="time">
                            <br>
                            <br>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>