<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Create Role
                            <a  class="btn btn-primary float-end" href="{{ url(path: 'roles')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('roles')}}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="permission">Role Name</label>
                                <input name="name" class="form-control" type="text"/>
                                <button type="submit"></button>
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 