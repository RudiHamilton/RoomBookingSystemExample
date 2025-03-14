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
                                <a  class="btn btn-primary float-end" href="{{ url(path: 'rooms/create')}}">Add Room</a>
                            @endcan
                        </h2>
                    </div>
                    @livewire('roomfiltering')
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>