@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-8">

        <h2 class="text-4xl font-extrabold text-gray-700 mb-5">
            Hotel Management
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add Hotel Form --}}
        <div class="bg-white shadow rounded-lg mb-6">

            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    Add Hotel
                </h2>
            </div>

            <div class="p-6">

                <form action="{{route('web.hotels.store')}}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                        {{-- Hotel Name --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Hotel Name
                            </label>

                            <input
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200"
                            >
                        </div>

                        {{-- City --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                City
                            </label>

                            <input type="text" name="city" value="{{ old('city') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>

                        {{-- Country --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Country
                            </label>

                            <input type="text" name="country" value="{{ old('country') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>

                        {{-- Rating --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Rating
                            </label>

                            <input type="number" name="rating" min="1" max="5" value="{{ old('rating') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>

                        <div class="flex items-end">
                            <input type="submit" value="Add Hotel" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition">
                        </div>

                    </div>
                </form>

            </div>
        </div>

        {{-- Filter Form --}}
        <div class="bg-white shadow rounded-lg mb-6">

            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    Filter Hotels
                </h2>
            </div>

            <div class="p-6">

                <form method="GET" action="{{route('web.hotels.index')}}">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <input type="text" name="city" placeholder="Filter by city" value="{{ request('city') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>
                        <div>
                            <button type="submit" class="w-full bg-gray-800 hover:bg-gray-900 text-white py-2 px-4 rounded-lg transition">
                                Filter
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>

        {{-- Hotels Table --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">

            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    Hotels List
                </h2>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">ID</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Name</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">City</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Country</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">Rating</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @forelse($hotels as $hotel)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $hotel->id }}</td>
                            <td class="px-6 py-4">{{ $hotel->name }}</td>
                            <td class="px-6 py-4">{{ $hotel->city }}</td>
                            <td class="px-6 py-4">{{ $hotel->country }}</td>
                            <td class="px-6 py-4">{{ $hotel->rating }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-gray-500">
                                No Hotels Found
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $hotels->links() }}
        </div>

    </div>

@endsection
