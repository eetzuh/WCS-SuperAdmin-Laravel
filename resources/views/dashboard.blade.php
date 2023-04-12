@php use function PHPUnit\Framework\isEmpty; @endphp
<x-app-layout>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight";
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if(Auth::user()->super_admin== true)
                        <a class='btn btn-secondary' href="{{route('superadmin.create')}}">Add new user</a>
                        <table class="table table-hover table-responsive mt-3">
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th></th>
                                <th></th>

                            </thead>
                            <tbody>
                            @if($users->count()==0)
                                </table>
                                    <p class="text-danger">No data</p>
                            @endif
                                @foreach($users as $user)
                                    <tr class="col align-middle">
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> <a class="btn btn-outline-warning" href="{{route('superadmin.edit', $user->id)}}">Edit</a></td>
                                    <td><form action="{{route('superadmin.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div>
                            {{$users->links()}}
                        </div>
                    @else
                        Welcome!
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
