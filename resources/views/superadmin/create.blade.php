<x-app-layout>
    <x-slot name="header">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight";
        {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a class="btn btn-outline-secondary" href="{{route('dashboard')}}">Back</a>
                    <form class="mt-3" method="post" action="{{route('superadmin.store')}}">
                        @csrf
                        <div>
                            <label for="name" class="form-label fw-medium">Username</label>
                            <div class="col-4 mb-2">
                                <input type="text" name="name" class="form-control">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="form-label fw-medium">Email</label>
                            <div class="col-4 mb-2">
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="password" class="form-label fw-medium">Password</label>
                            <div class="col-4">
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <button class="mt-3 btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
