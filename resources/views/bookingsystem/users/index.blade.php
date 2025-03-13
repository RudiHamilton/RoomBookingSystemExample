<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>View Users
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>User ID</th>
                                    <th>First Name</th>
                                    <th>Second Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Credit</th>
                                    <th>Email verfied?</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{$user->user_id}}</td>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->second_name}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->credit}}</td>
                                    <td>{{$user->email_verified_at}}</td>
                                    @can('delete users')
                                    <td>
                                        @can('edit users')
                                            <a href="{{url('users/'.$user->user_id.'/edit')}}" class="btn btn-success">Edit</a>
                                        @endcan
                                        @can('delete users')
                                            <a href="{{url('users/'.$user->user_id.'/delete')}}"class="btn btn-danger">Delete</a>
                                        @endcan
                                    </td>
                                    @endcan
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