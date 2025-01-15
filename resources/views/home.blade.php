<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-gray-100">
        <p>Explore the latest collection of men's, women's and kids' fashion at Zeks Store, offering trendy yet affordable styles. From casual to formal wear, each piece is designed to make you feel confident every day. Discover the latest trends that suit the active and dynamic lifestyle of Indonesian. Shop now and enjoy exclusive offers only at Zeks Store!
        </p>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Collections</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @foreach ($products as $product)
                        <div class="group relative">
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                            <h3 class="mt-6 text-sm text-gray-500">
                                <a href="#">
                                    <span class="absolute inset-0 pointer-events-none"></span>
                                    {{ $product->name }}
                                </a>
                            </h3>
                            <p class="text-base font-semibold text-gray-900">${{ $product->price }}</p>
                            <p class="text-base font-semibold text-gray-900">Stock: {{ $product->stock }}</p>
                            <button type="button" onclick="addToCart({{ $product->id }}, event)"
                                class="mt-4 bg-blue-500 text-white px-4 py-2 rounded z-10">
                                Add to Cart
                            </button>
                        </div>
                    @endforeach
                </div>
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
</x-layout>
