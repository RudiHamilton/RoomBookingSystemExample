<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Booking
                            <a  class="btn btn-primary float-end" href="{{ url('bookings')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('bookings/'.$bookings->booking_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <x-input-label for="room_id" class="mt1" :value="__('Select date and time of booking:')" />
                            <select name="room_id">
                                @foreach ($rooms as $room)
                                    <option value="{{$room->room_id}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <x-input-label for="user_id" class="mt1" :value="__('Select date and time of booking:')" />
                            <select name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{$user->user_id}}">{{$user->first_name." ".$user->second_name}}</option>
                                @endforeach
                            </select>
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