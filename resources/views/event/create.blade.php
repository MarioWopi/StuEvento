<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form action="{{route('events.store')}}" method="POST">
                        @csrf
                        @method("POST")

                        <div class="form-group">
                            <label for="title">Event Title</label>
                            <input type="text" class="form-control" name="title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Location</label>
                            <input type="text" class="form-control" name="location">
                        </div>
                        <div class="form-group">
                            <label for="title">Date</label>
                            <input type="date" class="form-control" name="date">
                        </div>

                        <button class="btn btn-outline-success" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>