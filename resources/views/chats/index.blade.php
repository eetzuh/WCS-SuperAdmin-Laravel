
{{--@php use function PHPUnit\Framework\isEmpty; @endphp--}}
@php use function PHPUnit\Framework\isEmpty; @endphp
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight";>
        </h2>
    </x-slot>

    <div class="mt-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold">
                    {{$friend->name}}
                </div>
            </div>
        </div>
    </div>
    <div class="mt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 font-semibold" style="height: 43rem; overflow-y: scroll;">
                 <pre>
                     @foreach($test as $message)
                         {{$message->sentMessages}}
                     @endforeach
                     asd
                     as
                     da
                     dsa
                     d
                     ad
                     as

                     as
                     d
                     asd
                     asd
                     as
                     das
                     d
                     asd
                     asd
                     sa
                     da
                     sd
                     asd
                     a
                     as
                     d
                     asd
                     ad
                     sad
                     a
                     das
                     dsa
                     da
                     d
                     ad
                     ad
                     sa
                     sa
                     dsa
                     d
                 </pre>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h-15 text-gray-900 ">
                    <form action="{{route('chats.send'), $friend->id}}" method="post"><div class="row">
                            @csrf
                            <input type="hidden" name="chatId" value="{{$chat->id}}">
                            <input type="hidden" name="friendId" value="{{auth()->user()->id}}">
                            <input style="width: 95%" type="text" name="message" maxlength = "300">
                            <button style="width: 5%"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                </svg></button>
                        </div></form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
