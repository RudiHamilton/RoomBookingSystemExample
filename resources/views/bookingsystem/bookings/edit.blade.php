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
                            <x-input-label for="room_id" class="mt1" :value="__('Select room:')" />
                            <select name="room_id">
                                @foreach ($rooms as $room)
                                    <option value="{{$room->room_id}}">{{$room->name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <x-input-label for="user_id" class="mt1" :value="__('Select user:')" />
                            <select name="user_id">
                                @foreach ($users as $user)
                                    <option value="{{$user->user_id}}">{{$user->first_name." ".$user->second_name}}</option>
                                @endforeach
                            </select>
                            <br>
                            <x-input-label for="name" :value="__('Select date and time of booking:')" />
                            <input name="date" class="date" type="date" value="{{$bookings->date}}"><br>
                            <x-input-label for="date" :value="__('Select the start and end time of booking:')" />
                            <select name="timeStart" class="timeStart" value="{{$bookings->timeStart}}">
                                <option value="07:00:00">07:00</option>
                                <option value="08:00:00">08:00</option>
                                <option value="09:00:00">09:00</option>
                                <option value="10:00:00">10:00</option>
                                <option value="11:00:00">11:00</option>
                                <option value="12:00:00">12:00</option>
                                <option value="13:00:00">13:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="15:00:00">15:00</option>
                                <option value="16:00:00">16:00</option>
                                <option value="17:00:00">17:00</option>
                                <option value="18:00:00">18:00</option>
                                <option value="19:00:00">19:00</option>
                                <option value="20:00:00">20:00</option>
                                <option value="21:00:00">21:00</option>
                                <option value="22:00:00">22:00</option>
                            </select>
                            -
                            <select name="timeEnd" class="timeEnd" value="{{$bookings->timeEnd}}">
                                <option value="07:00:00">07:00</option>
                                <option value="08:00:00">08:00</option>
                                <option value="09:00:00">09:00</option>
                                <option value="10:00:00">10:00</option>
                                <option value="11:00:00">11:00</option>
                                <option value="12:00:00">12:00</option>
                                <option value="13:00:00">13:00</option>
                                <option value="14:00:00">14:00</option>
                                <option value="15:00:00">15:00</option>
                                <option value="16:00:00">16:00</option>
                                <option value="17:00:00">17:00</option>
                                <option value="18:00:00">18:00</option>
                                <option value="19:00:00">19:00</option>
                                <option value="20:00:00">20:00</option>
                                <option value="21:00:00">21:00</option>
                                <option value="22:00:00">22:00</option>
                            </select>
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