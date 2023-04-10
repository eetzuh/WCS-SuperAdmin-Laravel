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
                    <a href="{{url()->previous()}}">Back</a>
                    <form method="post" action="{{route('superadmin.store')}}">
                        @csrf
                        <div>
                            <label for="name">Username</label>
                            <input type="text" name="name">
                            @error('name')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email">
                            @error('email')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="password">Password</label>
                            <input type="password" name="password">
                            @error('password')
                            <div>{{ $message }}</div>
                            @enderror
                        </div>
                        <button>Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
