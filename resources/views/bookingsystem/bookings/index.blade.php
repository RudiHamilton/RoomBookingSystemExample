<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>View Bookings
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
                        </h2>
                    </div>
                    @livewire('bookingfiltering')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>