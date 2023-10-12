<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 id="size-change" class=" font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Orders' }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 <!-- order list component: section -->
 <section>
    <div class="pb-16 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Your Order Items</h1>
        <div class="flex justify-center items-center">

            <p class="ml-3 text-sm font-bold text-red-500">{{ session()->get('status') }}</p>

        </div>
        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">

            <div class="rounded-lg md:w-2/3">
                    @foreach ($cart_items as $cart_item)
                <div
                    class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                    <img
                    src="{{ Storage::url($cart_item->post->featured_image) }}"
                    alt="product-image"
                        class="w-full rounded-lg sm:w-40" />
                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                        <div class="mt-5 sm:mt-0">
                            <h2 name="name" class="text-lg font-bold text-gray-900">
                                {{ $cart_item->post->title }}
                            </h2>
                            <p  class="mt-1 text-xs text-gray-700">
                                {{ $cart_item->post->content }}
                            </p>
                        </div>
                        <div
                            class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">

                            <div class="inline-block items-center space-x-4 bg-purple-500 p-1 rounded">
                                <h1 class="text-sm text-white font-bold">
                                    {{ number_format($cart_item->total_amount, 0, '.', ',') }}
                                    Tsh
                                </h1>


                            </div>

                              <div class="inline-block items-center space-x-4 p-1 rounded">
                                <h1 class="text-sm text-gray-600 font-bold">
                                    {{ ($cart_item->total_order) }}
                                    qty
                                </h1>

                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
            {{-- @endif --}}
            </div>
        </div>
    </div>
</section>
<!-- End order list component: section -->

            </div>
        </div>
    </div>
</x-app-layout>
