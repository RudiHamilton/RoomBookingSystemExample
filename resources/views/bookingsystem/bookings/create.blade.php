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
                                <p class="block font-medium text-sm text-gray-700 mb-2">Does Room require Deposit? --- {{$room->require_deposit ? 'True' : 'False'}}</p>
                            <x-input-label for="name" :value="__('Room Deposit Cost --- '.$room->deposit_cost)" />
                            <br>
                            <x-input-label for="name" :value="__('Select date of booking:')" />
                            <input name="date" class="date" type="date" required><br><br>
                            <x-input-label for="date" :value="__('Select the start and end time of booking:')" />
                            <select name="timeStart" class="timeStart" required>
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
                            <select name="timeEnd" class="timeEnd" required>
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