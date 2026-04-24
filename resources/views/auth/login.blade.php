@extends("layouts.app")
@section("content")

<div class="max-w-sm mx-auto">
    <h2 class="text-4xl font-extrabold text-gray-700">Login</h2>

    <form  method="POST" action="{{route('login')}}">
        @csrf
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-gray-800 focus:ring-blue-500 focus:border-blue-500" placeholder="email@domain.com" />
            <div class="block mb-2 text-sm font-medium text-red-600 text-red">{{$errors->any()?$errors->first("email"):""}}</div>
        </div>
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 text-white">Your password</label>
            <input type="password"  name="password" id="password" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-white border-gray-600 placeholder-gray-400 text-whitefocus:ring-blue-500 focus:border-blue-500"  />
            <div class="block mb-2 text-sm font-medium text-red-600 text-red">{{$errors->any()?$errors->first("password"):""}}</div>
        </div>
        <div class="mb-5">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Submit</button>
        </div>
    </form>
</div>







@endsection
