{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <title>Dashboard</title>--}}
{{--</head>--}}
{{--<body>--}}
@extends("layouts.app")
@section("content")
    <div class="max-w-xl mx-auto">



        <h2 class="text-4xl font-extrabold text-gray-700 mb-5">Dashboard</h2>
        <div class="mb-5">
            <a href="/search" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Search</a>
            <a href="/hotels" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Hotel Management </a>
            <a href="/rooms" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Room Management</a>
            <form method="POST" action="/logout" class="inline-flex">
                @csrf
                <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Logout</button>
            </form>
        </div>
        <p>Total Hotels: {{ $hotelsCount }}</p>
        <p>Total Rooms: {{ $roomsCount }}</p>
        @endsection
    </div>
{{--</body>--}}
{{--</html>--}}
