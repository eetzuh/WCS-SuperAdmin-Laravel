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
                    <form method="post" class="mt-3" action="{{route('superadmin.update', $user->id)}}">
                        @csrf
                        @method('PUT')
                        <div>
                            <input type="hidden" name="id" value="{{$user->id}}">
                        </div>
                        <div>
                            <label for="username" class="form-label fw-medium">Username</label>
                            <div class="col-4 mb-2">
                                <input type="text" name="name" class="form-control" value="{{$user->name}}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="email" class="form-label fw-medium">Email</label>
                            <div class="col-4 mb-2">
                                <input type="email" name="email" class="form-control" value="{{$user->email}}">
                                @error('email')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label for="password" class="form-label fw-medium">New password</label>
                            <div class="col-4">
                                <input type="password" name="password" class="form-control" placeholder="Leave blank to keep password">
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
