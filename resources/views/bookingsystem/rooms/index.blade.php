<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>View Rooms
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
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