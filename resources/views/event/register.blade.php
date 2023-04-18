<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{route('events.store')}}" method="POST">
                        @csrf
                        @method("POST")

                        <div class="form-group">
                            Add assistants:
                            <br> <br>
                            <select class="form-select" name="assistant">
                                <option value="" disabled selected>Select the assistant</option>

                                @foreach($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach

                            </select>
                        </div>
                        <br>
                        <button class="btn btn-outline-success" type="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>