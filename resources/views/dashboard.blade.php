<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    
                </div>
                @can('role control')
                    <a href="{{url('roles')}}"class="btn btn-xs btn-info pull-right m-3">View Roles</a>
                @endcan
                @can('permission control')
                    <a href="{{url('permissions')}}" class="btn btn-xs btn-info pull-right m-3">View Permissions</a>
                @endcan
                @can('view rooms')
                    <a href="{{url('rooms')}}" class="btn btn-xs btn-info pull-right m-3">View Rooms</a>
                @endcan
                @can('view bookings')
                    <a href="{{url('bookings')}}" class="btn btn-xs btn-info pull-right m-3">View Bookings</a>
                @endcan
                @can('view users')
                    <a href="{{url('users')}}" class="btn btn-xs btn-info pull-right m-3">View Users</a>
                @endcan
               
            </div>
        </div>
    </div>
</x-app-layout>
