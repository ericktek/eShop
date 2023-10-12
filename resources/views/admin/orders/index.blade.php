<style>
    /* Custom CSS for inline block */
    .search-container {
                    display: flex;
                    align-items: baseline;
                    margin-right: 10rem;
                }

        .search-container input {
                    flex: 1;
                    margin-right: 10px;

                }
        .container-search {
            margin-right: 0px;

        }
        .left-object {
            display: flex;
            align-items: baseline;
            top: 0;
            bottom: 0;
        }

    @media only screen and (max-width: 600px) {
            #size-hidde {
                display: none;
            }

            #action {
                font-size: 9px;
            }
            #size-change {
                font-size: medium;
                font-weight: 500;
            }
            #small {
                margin-top: 10px;
                padding: 5px;
            }
            #sm-w {
                width: 10rem;
                padding-right: 3rem;
            }

        }

    </style>
    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between">
                <h2 id="size-change" class=" font-semibold text-xl text-gray-800 leading-tight">
                    {{ 'Orders' }}
                </h2>
                <form class="container-search" action="{{ route('order.search') }}" method="GET">
                <div class="pt-2 relative mx-auto text-gray-600">
                    <input id="sm-w" class="border-2 border-gray-300 bg-white h-10 px-5 w-96 pr-14 rounded-lg text-sm focus:outline-none
                                placeholder-gray-500 focus:placeholder-gray-400
                                hover:border-blue-400 focus:border-blue-400
                                transition duration-300"
                           type="search"
                           name="query"
                           placeholder="Search..."
                    required>
                    <button type="submit" class="absolute right-0 top-0 mt-3 mr-2 p-2">
                        <svg class=" text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"
                             viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve"
                             width="512px" height="512px">
                            <path
                                d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                        </svg>
                    </button>
                </div>
                </form>
        </div>
        </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- order list component: section -->
 <section>
    <div class="pb-16 pt-20">
        <h1 class="mb-10 text-center text-2xl font-bold">Customer Order Lists</h1>
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
                                {{ $cart_item->user->name }}
                            </h2>
                            <p  class="mt-1 text-xs text-gray-700">
                                {{ $cart_item->user->email }}
                            </p>
                            <h2 name="name" class="lg:mt-10 text-sm font-bold text-gray-600 ta">
                                Qty {{ $cart_item->total_order }}
                             </h2>
                        </div>

                        <div
                            class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">

                            <div class="inline-block lg:ml-20  space-x-4 bg-purple-500 p-1 rounded">
                                <h1 class="text-sm text-white font-bold">
                                    {{ number_format($cart_item->post->price, 0, '.', ',') }}
                                    Tsh
                                </h1>

                            </div>
                            <form action="{{ route('removeCartItem', ['cart_item' => $cart_item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            <button class="text-gray-600 lg:ml-20 transition hover:text-red-600">
                                <span class="sr-only">Remove item</span>

                                <svg
                                  xmlns="http://www.w3.org/2000/svg"
                                  fill="none"
                                  viewBox="0 0 24 24"
                                  stroke-width="1.5"
                                  stroke="currentColor"
                                  class="h-4 w-4"
                                >
                                  <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                  />
                                </svg>
                              </button>
                              </form>
                              <div class="inline-block items-center  space-x-4  p-1 rounded">
                                <h1 class="text-sm text-gray-500 font-bold">
                                   Call: {{ $cart_item->user->phone_number }}
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
