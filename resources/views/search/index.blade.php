@extends('layouts.app')
@section('content')
    <div class="max-w-sm mx-auto">
        <h2 class="text-4xl font-extrabold text-gray-700">Search Hotels</h2>

        <form method="POST" action="/search">
            @csrf

            <div class="mb-5">
                <label for="text" class="block mb-2 text-sm font-medium text-gray-900 text-white">City</label>
                <input type="text" name="city" placeholder="City" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-900 focus:ring-blue-500 focus:border-blue-500">
            </div>

            <div class="mb-5">

            <div id="date-range-picker" date-rangepicker  class="flex items-center">
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-start" name="checkin_date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  bg-white border-gray-600 dark:placeholder-gray-400 text-gray-900 focus:ring-blue-500 focus:border-blue-500 placeholder:text-body" placeholder="Checkin date">
                </div>
                <span class="mx-4 text-gray-500">to</span>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-400 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input id="datepicker-range-end" name="checkout_date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  bg-white border-gray-600 dark:placeholder-gray-400 text-gray-900 focus:ring-blue-500 focus:border-blue-500" placeholder="Checkout date">
                </div>
            </div>

            <div class="mb-5">
                <label for="guests" class="block mb-2 text-sm font-medium text-gray-900 text-white">Guests</label>
                <input type="number" name="guests" placeholder="Guests" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-700 border-gray-600 placeholder-gray-400 text-gray-900 focus:ring-blue-500 focus:border-blue-500">
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
    @if($errors->any())
            <div class="flex items-center p-4 mb-4 text-sm text-red-800 border border-red-200 rounded-lg bg-red-50 bg-gray-800 text-red-400" role="alert">
                <svg class="shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                </svg>
                <span class="sr-only">Info</span>
                <div>
                     {{$errors->first()}}
                </div>
            </div>

        @endif
    @if(isset($results))
            <h2>Results</h2>

        @foreach($results as $result)

                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700 mb-5">
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $result['hotel']['name'] }}</h5>
                        </a>
             @foreach($result['rooms'] as $room)
                <p>
                    <div class="flex items-center justify-between">
                        <span class="text-xl  text-gray-900 dark:text-white">Room: {{ $room['room_name'] }}</span>
                        <span class="text-xl  text-gray-900 dark:text-white">Price: {{ $room['total_price'] }}EGP</span>
                    </div>
                </p>
             @endforeach
                    </div>
                </div>
        @endforeach
    @endif
    </div>
@endsection
