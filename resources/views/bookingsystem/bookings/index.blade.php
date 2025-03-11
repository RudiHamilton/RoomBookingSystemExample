<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>View Bookings
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Booking ID</th>
                                    <th>User ID</th>
                                    <th>Room ID</th>
                                    <th>Date and Time booked</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{$booking->booking_id}}</td>
                                    <td>{{$booking->user_id}}</td>
                                    <td>{{$booking->room_id}}</td>
                                    <td>{{$booking->date}}</td>
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