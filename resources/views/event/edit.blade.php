<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 style="font-size: 30px;">Edit Event</h1>
                    <br>
                    <form action="{{route('events.update', $event->id)}}" method="POST">
                        @csrf
                        @method("PUT")
                        <div class="form-group">
                            <label for="title">Event Title</label>
                            <input type="text" class="form-control" value="{{$event->title}}" name="title">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" name="description" rows="3">{{$event->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="title">Location</label>
                            <input type="text" class="form-control" value="{{$event->location}}" name="location">
                        </div>
                        <div class="form-group">
                            <label for="title">Date</label>
                            <input type="datetime-local" class="form-control" value="{{$event->date}}" name="date">
                        </div>
                        <br>
                        <button class="btn btn-warning" type="submit">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>