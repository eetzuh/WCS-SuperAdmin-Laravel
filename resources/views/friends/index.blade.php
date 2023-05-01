
{{--@php use function PHPUnit\Framework\isEmpty; @endphp--}}
@php use function PHPUnit\Framework\isEmpty; @endphp
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight";>
        {{--            {{ __('Dashboard') }}--}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                            <table class="table table-hover table-responsive mt-3">
                                <thead>
                                <th>Friends</th>
                                <th></th>
                                <th></th>
                                </thead>
                                <tbody>
                                @if($friends->count()==0 )
                            </table>
                            <p class="text-danger">No friends</p>
                        @endif
                        @foreach($friends as $friend)
                            <tr class="col align-middle">
                                <td>{{$friend->name}}</td>
                                <td><form action="{{route('chats.index')}}" method="get">
                                        <input type="hidden" name="friendId" value="{{$friend->id}}" >
                                        <button class="btn btn-outline-success">Message</button>
                                    </form>
{{--                                    <form action="{{route('friends.remove', $friend->id)}}" method="post">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <input type="hidden" name="friendId" value="{{$friend->id}}">--}}
{{--                                        <button class="btn btn-outline-danger">Delete</button>--}}
{{--                                    </form>--}}
                                </td>
                            </tr>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
