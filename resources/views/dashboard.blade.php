<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session()->has('status'))
                        <div class="pb-4 flex justify-center items-center">

                            <p class="ml-3 p-4  text-sm font-bold text-green-600">{{ session()->get('status') }}</p>
                        </div>
                    @endif
                    <h1>Hi, welcome to the eShop Dashboard! Click <a href="{{ url('/order-user') }}"
                            style="color: rgb(23, 23, 226)">'Orders'<a> to preview Or start new orders by go back to shop
                                <a href="{{ url('/') }}" style="color: rgb(23, 23, 226)">'Click Here'</a>
                    </h1>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
