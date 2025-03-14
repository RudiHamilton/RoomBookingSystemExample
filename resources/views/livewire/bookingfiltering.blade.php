<div>
    <div class="card-body">
        <input 
            type="text" 
            wire:model.live.debounce.300ms="search" 
            placeholder="Search Bookings..."
            class="border px-3 py-2 rounded w-full"
        />
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Booking ID</th>
                    <th>User ID</th>
                    <th>Room ID</th>
                    <th>Date booked</th>
                    <th>Time Slot booked</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bookings as $booking)
                <tr>
                    <td>{{$booking->booking_id}}</td>
                    <td>{{$booking->user_id}}</td>
                    <td>{{$booking->room_id}}</td>
                    <td>{{$booking->date}}</td>
                    <td>{{$booking->timeStart}} - {{$booking->timeEnd}}</td>
                    <td>
                        @can('edit bookings')
                            <a href="{{url('bookings/'.$booking->booking_id.'/edit')}}" class="btn btn-success">Edit</a>
                        @endcan
                        @can('delete bookings')
                            <a href="{{url('bookings/'.$booking->booking_id.'/delete')}}"class="btn btn-danger">Delete</a>
                        @endcan
                    </td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{$bookings->links('pagination::bootstrap-5')}}
        </div>
    </div>
</div>