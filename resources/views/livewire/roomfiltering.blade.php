<div>
    <div class="card-body">
        <input 
            type="text" 
            wire:model.live.debounce.300ms="search" 
            placeholder="Search Rooms..."
            class="border px-3 py-2 rounded w-full"
        />
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room Name</th>
                    <th>Room Type</th>
                    <th>Room Capacity</th>
                    <th>Room Require Deposit?</th>
                    <th>Deposit Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rooms as $room)
                <tr>
                    <td>{{$room->room_id}}</td>
                    <td>{{$room->name}}</td>
                    <td>{{$room->type}}</td>
                    <td>{{$room->capacity}}</td>
                    <td>{{$room->require_deposit ? 'True' : 'False' }}</td>
                    <td>{{$room->deposit_cost}}</td>
                    <td>
                        @can('edit rooms')
                            <a href="{{url('rooms/'.$room->room_id.'/edit')}}" class="btn btn-success">Edit</a>
                        @endcan
                        @can('delete rooms')
                            <a href="{{url('rooms/'.$room->room_id.'/delete')}}"class="btn btn-danger">Delete</a>
                        @endcan
                        @can('create bookings')
                            <a  class="btn btn-primary float-end mt-1" href="{{ url(path: 'bookings/create/'.$room->room_id)}}">Add Booking with this Room</a>
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$rooms->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>