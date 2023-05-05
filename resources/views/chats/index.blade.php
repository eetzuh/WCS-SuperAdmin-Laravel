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
                <div class="p-6 text-gray-900 scroll" id="messageBody">
                     @foreach($messages as $key=>$message)
                        @if($key==date('Y-m-d'))
                             <p class="messageDate mb-5">Today</p>
                        @elseif($key== date('Y-m-d',strtotime("yesterday")))
                             <p class="messageDate mb-5">Yesterday</p>
                        @else
                             <p class="messageDate mb-5">{{$key}}</p>
                        @endif
                         @foreach($message as $text)
                         @if($text->sender_id == $friend->id)
                             <div class="d-flex justify-content-start mb-2 timeDiv">
                                 <img src="{{ asset('storage/images/avatar.jpg')}}" class="avatarFriend">
                                 <p class="messageFriend message">
                                     {{$text->message}}
                                 </p>
                                 <p class="timeFriend time">
                                     {{substr($text->created_at,11, 5)}}
                                 </p>
                             </div>
                         @else
                             <div class="d-flex justify-content-end text-white mb-2 timeDiv">
                                 <p class="timeUser time">
                                     {{substr($text->created_at,11, 5)}}
                                 </p>
                                 <p class="messageUser message">
                                 {{$text->message}}
                                 </p>
                                 <img src="{{ asset('storage/images/avatar.jpg')}}" class="avatarUser">
                             </div>

                         @endif
                         @endforeach
                     @endforeach

                </div>
            </div>
            <script>
                let scrollbar = document.getElementById("messageBody");
                scrollbar.scrollTop = scrollbar.scrollHeight;
            </script>
        </div>
    </div>
    <div class="mt-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h-15 text-gray-900 ">
                    <form autocomplete="off" action="{{route('chats.send'), $friend->id}}" method="post"><div class="d-flex col">
                            @csrf
                            <input type="hidden" name="chatId" value="{{$chat->id}}">
                            <input type="hidden" name="friendId" value="{{auth()->user()->id}}">
                            <input class="chatInput"  type="text" name="message" maxlength = "300" placeholder="Message {{$friend->name}}...">
                            <button class="send" ><svg xmlns="http://www.w3.org/2000/svg" width="20px"  fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
                                    <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
                                </svg></button>
                        </div></form>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
