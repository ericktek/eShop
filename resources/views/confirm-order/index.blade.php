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
                <!-- Sub total -->

                <!-- Checkout component: section -->
                <section>
                    <div class="pb-16 pt-20">
                        <h1 class="mb-10 text-center text-2xl font-bold">Place Order Here</h1>
                        <div class="mx-auto max-w-5xl justify-center px-6 md:flex md:space-x-6 xl:px-0">
                            <div class="rounded-lg md:w-2/3">

                                <div
                                    class="justify-between mb-6 rounded-lg bg-white p-6 shadow-md sm:flex sm:justify-start">
                                    <img src="{{ Storage::url($post->featured_image) }}" alt="product-image"
                                        class="w-full rounded-lg sm:w-40" />
                                    <div class="sm:ml-4 sm:flex sm:w-full sm:justify-between">
                                        <div class="mt-5 sm:mt-0">
                                            <h2 name="name" class="text-lg font-bold text-gray-900">{{ $post->title }}</h2>
                                            <p  class="mt-1 text-xs text-gray-700">{{ $post->content }}</p>
                                        </div>
                                        <div
                                            class="mt-4 flex justify-between im sm:space-y-6 sm:mt-0 sm:block sm:space-x-6">

                                            <div name="price" class="inline-block items-center space-x-4 bg-purple-500 p-1 rounded">
                                                <h1 class="text-sm text-white font-bold">
                                                    {{ number_format($post->price, 0, '.', ',') }}Tsh</h1>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Sub total -->

                            <div class="mt-6 h-full rounded-lg border bg-white p-6 shadow-md md:mt-0 md:w-1/3">
                                <form action="{{ route('submitOrder', ['id' => $post->id]) }}" method="POST">
                                    @csrf
                                    <div class="mb-2 flex justify-between">
                                        <p class="text-gray-700">Subtotal</p>
                                        <p class="text-gray-700">{{ number_format($post->price, 0, '.', ',') }} Tsh</p>
                                    </div>
                                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                                    <input type="hidden" name="price" value="{{ $post->price }}">

                                    <div class="flex justify-between">
                                        <p class="text-gray-700">Shipping</p>
                                        <p class="text-gray-700">0 Tsh</p>
                                    </div>

                                    <hr class="my-4" />

                                    <div  class="flex justify-between">
                                        <p class="text-lg font-bold">Total</p>
                                        <div class="">
                                            <p id="totalDisplay" class="mb-1 text-lg font-bold">
                                                {{ number_format($post->price, 0, '.', ',') }} Tsh</p>
                                            <p class="text-sm text-gray-700">Free shipping</p>
                                        </div>
                                    </div>
                                    <div>

                                        <div class="flex items-center gap-1">
                                          <button
                                            type="button"
                                            class="h-10 w-10 leading-10 text-gray-600 transition hover:opacity-75"
                                          >
                                            &minus;
                                          </button>

                                          <input
                                            type="number"
                                            name="total_order"
                                            id="quantityInput"
                                            value="1"
                                            class="h-10 w-24 rounded border-gray-200 sm:text-sm"
                                          />


                                          <button
                                            type="button"
                                            class="h-10 w-10 leading-10 text-gray-600 transition hover:opacity-75"
                                          >
                                            &plus;
                                          </button>
                                        </div>
                                      </div>

                                    <button type="submit"
                                        class="mt-6 w-full rounded-md bg-purple-500 py-1.5 font-medium text-blue-50 hover:bg-purple-600">Submit Order
                                        </button>
                                    </form>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End Checkout component: section -->

            </div>
        </div>
    </div>
    <script>
        // Get references to the quantity input and total display elements
        const quantityInput = document.getElementById('quantityInput');
        const totalDisplay = document.getElementById('totalDisplay');

        // Get the initial product price and convert it to a number
        const productPrice = parseFloat('{{ $post->price }}');

        // Function to update the total based on the quantity
        function updateTotal() {
            const quantity = parseInt(quantityInput.value, 10);
            const total = productPrice * quantity;

            // Update the total display with the formatted total
            totalDisplay.innerText = total.toLocaleString() + ' Tsh';
        }

        // Add an event listener to the quantity input to update the total on change
        quantityInput.addEventListener('input', updateTotal);

        // Initial update of the total
        updateTotal();
    </script>

</x-app-layout>
