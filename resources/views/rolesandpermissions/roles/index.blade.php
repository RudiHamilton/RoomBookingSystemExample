<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h2>View Roles
                            <a  class="btn btn-primary float-end" href="{{ url('dashboard')}}">Back</a>
                            <a  class="btn btn-primary float-end" href="{{ url(path: 'roles/create')}}">Add</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Role ID</th>
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td>{{$role->id}}</td>
                                    <td>{{$role->name}}</td>
                                    <td>
                                        <a href="{{url('roles/'.$role->id.'/edit')}}" class="btn btn-success">Edit</a>
                                        <a href="{{url('roles/'.$role->id.'/delete')}}"class="btn btn-danger">Delete</a>
                                        <a href="{{url('roles/'.$role->id.'/addpermission')}}" class="btn btn-primary">Add/Edit Role Permission</a>
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