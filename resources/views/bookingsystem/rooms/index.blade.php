<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>View Rooms
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
                            @can('create rooms')
                                <a  class="btn btn-primary float-end" href="{{ url(path: 'rooms/create')}}">Add</a>
                            @endcan
                        </h2>
                    </div>
                    <div class="card-body">
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
                                    <td>{{$room->require_deposit}}</td>
                                    <td>{{$room->deposit_cost}}</td>
                                    <td>
                                        @can('edit rooms')
                                            <a href="{{url('rooms/'.$room->room_id.'/edit')}}" class="btn btn-success">Edit</a>
                                        @endcan
                                        @can('delete rooms')
                                            <a href="{{url('rooms/'.$room->room_id.'/delete')}}"class="btn btn-danger">Delete</a>
                                        @endcan
                                        @can('create bookings')
                                            <a  class="btn btn-primary float-end" href="{{ url(path: 'bookings/create/'.$room->room_id)}}">Add</a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>