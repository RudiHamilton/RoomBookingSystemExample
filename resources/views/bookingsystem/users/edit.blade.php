<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit User
                            <a  class="btn btn-primary float-end" href="{{ url('users')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('users/'.$user->user_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="first_name" :value="__('First Name')" />
                                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="$user->first_name" autofocus autocomplete="first_name" />
                                {{-- <x-input-error :messages="$errors->get('first_name')" class="mt-2" /> --}}
                            </div>
                    
                            <!-- Second Name -->
                            <div>
                                <x-input-label for="second_name" :value="__('Second Name')" />
                                <x-text-input id="second_name" class="block mt-1 w-full" type="text" name="second_name" :value="$user->second_name" autofocus autocomplete="second_name" />
                                {{-- <x-input-error :messages="$errors->get('second_name')" class="mt-2" /> --}}
                            </div>
                    
                            <!-- Phone Number -->
                            <div class="mt-4">
                                <x-input-label for="phone_number" :value="__('Phone Number')" />
                                <x-text-input id="phone_number" class="block mt-1 w-full" type="text" name="phone_number" :value="$user->phone_number" autocomplete="phone_number" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                    
                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="$user->email" autocomplete="email" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-input-label for="credit" :value="__('Credit')" />
                                <x-text-input id="credit" class="block mt-1 w-full" type="number" name="credit" :value="$user->credit" autocomplete="credit" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <br>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                            <div class="mb-3">
                                <label for="permission">Roles</label>
                                <select name="roles[]" class="form-control" multiple>
                                    @foreach ( $roles as $role )
                                        <option value="{{$role}}"
                                        {{in_array($role, $userRoles) ? 'selected':''}}
                                        >{{$role}}</option>
                                    @endforeach
                                </select>
                                @error('roles') <span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout> 