@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-4 py-8">

        <h2 class="text-4xl font-extrabold text-gray-700 mb-5">
            Room Management
        </h2>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Validation Errors --}}
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
                <ul class="list-disc pl-5">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Add Room Form --}}
        <div class="bg-white shadow rounded-lg mb-8">

            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    Add Room
                </h2>
            </div>

            <div class="p-6">

                <form action="{{ route('web.rooms.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

                        {{-- Hotel --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Hotel
                            </label>

                            <select name="hotel_id" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                                <option value="">
                                    Select Hotel
                                </option>

                                @foreach($hotels as $hotel)
                                    <option value="{{ $hotel->id }}"@selected(old('hotel_id') == $hotel->id)>
                                        {{ $hotel->name }}
                                    </option>
                                @endforeach

                            </select>
                        </div>

                        {{-- Room Name --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Room Name
                            </label>

                            <input type="text" name="name" value="{{ old('name') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200" placeholder="Deluxe Room">
                        </div>

                        {{-- Price --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Price / Night
                            </label>

                            <input type="number" step="0.01" name="price_per_night" value="{{ old('price_per_night') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>

                        {{-- Max Occupancy --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Max Occupancy
                            </label>

                            <input type="number" min="1" name="max_occupancy" value="{{ old('max_occupancy') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>
                        {{-- Available Rooms --}}
                        <div>
                            <label class="block text-sm font-medium mb-2">
                                Available Rooms
                            </label>

                            <input type="number" min="0" name="available_rooms" value="{{ old('available_rooms') }}" class="w-full border rounded-lg px-3 py-2 focus:outline-none focus:ring focus:ring-blue-200">
                        </div>

                    </div>

                    {{-- Submit --}}
                    <div class="mt-6">

                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-medium px-6 py-2 rounded-lg transition">
                            Add Room
                        </button>

                    </div>

                </form>

            </div>

        </div>

        {{-- Rooms Table --}}
        <div class="bg-white shadow rounded-lg overflow-hidden">

            <div class="border-b px-6 py-4">
                <h2 class="text-xl font-semibold">
                    Rooms List
                </h2>
            </div>

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-100">

                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            ID
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Hotel
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Room Name
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Price
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Max Occupancy
                        </th>

                        <th class="px-6 py-3 text-left text-sm font-semibold text-gray-700">
                            Available Rooms
                        </th>
                    </tr>

                    </thead>

                    <tbody class="divide-y divide-gray-200 bg-white">

                    @forelse($rooms as $room)

                        <tr class="hover:bg-gray-50">

                            <td class="px-6 py-4">
                                {{ $room->id }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $room->hotel->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $room->name }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $room->price_per_night }} EGP
                            </td>

                            <td class="px-6 py-4">
                                {{ $room->max_occupancy }}
                            </td>

                            <td class="px-6 py-4">
                                {{ $room->available_rooms }}
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                                No Rooms Found
                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

@endsection
