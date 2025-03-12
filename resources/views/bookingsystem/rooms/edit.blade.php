<x-app-layout>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Room
                            <a  class="btn btn-primary float-end" href="{{ url('rooms')}}">Back</a>
                        </h2>
                    </div>
                    <div class="card-body">
                        <form action="{{url('rooms/'.$rooms->room_id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div>
                                <x-input-label for="name" :value="__('Name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="$rooms->name" required autofocus autocomplete="name" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div><br>

                            <div>
                                <x-input-label for="type" :value="__('Type')"/> 
                                <select class="block mt-1 w-full" name="type" :value="$rooms->type">
                                    <option>Computer</option>
                                    <option>Lab</option>
                                    <option>Lecture Hall</option>
                                    <option>Classroom</option>
                                    <option>Workshop</option>
                                </select>
                            </div><br>

                            <div>
                                <x-input-label for="capacity" :value="__('Capacity')" />
                                <x-text-input id="capacity" class="block mt-1 w-full" type="text" name="capacity" :value="$rooms->capacity" required autofocus autocomplete="capacity" />
                                <x-input-error :messages="$errors->get('capacity')" class="mt-2" />
                            </div><br>

                            <div>
                                <x-input-label for="require_deposit" :value="__('Does room require deposit?')" onChange="checkOption(this)"/> 
                                <select class="block mt-1 w-full" id="require_deposit" name="require_deposit" :value="$rooms->require_deposit">
                                    <option value="t">Yes</option>
                                    <option value="f">No</option>
                                </select>
                            </div><br>

                            <div>
                                <x-input-label for="deposit_cost" :value="__('Deposit cost?')" />
                                <x-text-input id="deposit_cost" class="block mt-1 w-full" type="text" name="deposit_cost" :value="$rooms->deposit_cost" autofocus autocomplete="deposit_cost" />
                                <x-input-error :messages="$errors->get('deposit_cost')" class="mt-2" />
                            </div><br>
                            <div class="mb-3">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>