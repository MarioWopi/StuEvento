<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div style="text-align: -webkit-center;">
                        <h1 style="margin-top: 30px;">Event</h1><br>
                        <table class="table table-striped" style="width: 70%; text-align: center;">
                            <tr>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Description
                                </th>
                                <th>
                                    Location
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Assistants
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            <tr>
                                <td> {{$event->title}} </td>
                                <td> {{$event->description}} </td>
                                <td> {{$event->location}} </td>
                                <td> {{$event->date}} </td>
                                <td>
                                    <ol>
                                        @foreach($assistants as $assistant)
                                        <li>{{$assistant}}</li>
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <a href="/events/{{$event->id}}/register">
                                        <button class="btn btn-info" style="width: max-content;">Add assistants</button>
                                    </a>
                                    <a href="/events/{{$event->id}}/edit">
                                        <button class="btn btn-warning" style="width: max-content;">Edit</button>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>