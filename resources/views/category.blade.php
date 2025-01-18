<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="bg-gray-100">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
            <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>

            <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
                @forelse ($products as $product)
                    <div class="group relative">
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                        <h3 class="mt-6 text-sm text-gray-500">
                            <a href="#">
                                <span class="absolute inset-0 pointer-events-none"></span>
                                {{ $product->name }}
                            </a>
                        </h3>
                        <p class="text-base font-semibold text-gray-900">IDR
                            {{ number_format($product->price, 0, ',', '.') }}</p>
                        <p class="text-base font-semibold text-gray-900">Stock: {{ $product->stock }}</p>
                        @auth
                            <button type="button" onclick="addToCart({{ $product->id }}, event)"
                                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded z-10">
                                Add to Cart
                            </button>
                        @endauth

                    </div>
                @empty
                    <p class="text-sm text-gray-600">No product available</p>
                @endforelse

                <!-- More products... -->
            </div>
        </div>
    </div>

    <script>
        function addToCart(productId, event) {
            event.preventDefault(); // Mencegah default behavior

            fetch(`/cart/add/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                }
            }).then(response => {
                if (response.ok) {
                    // Tampilkan alert sukses
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Product added to cart.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-blue-500 text-white px-4 py-2 rounded',
                        },
                    });
                } else {
                    // Tampilkan alert error
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to add product to cart.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                        },
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                    },
                });
            });
        }
    </script>
</x-app-layout>
