@php use function PHPUnit\Framework\isEmpty; @endphp
<x-app-layout>
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
                        <a href="{{route('superadmin.create')}}">Add new user</a>
                        <table>
                            <thead>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                            </thead>
                            <tbody>
                            @if($users->count()==0)
                                <td>No data</td>
                            @endif
                                @foreach($users as $user)
                                    <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td> <a href="{{route('superadmin.edit', $user->id)}}">Edit</a></td>
                                    <td><form action="{{route('superadmin.destroy', $user->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button>Delete</button>
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
