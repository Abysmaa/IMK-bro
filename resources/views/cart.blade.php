<x-app-layout>
        <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <section class="bg-gray-100">
        <div class="mx-auto max-w-screen-xl px-4 py-8 sm:px-6 sm:py-12 lg:px-8 bg-gray-100">
            <div class="mx-auto max-w-3xl">
                <header class="text-center">
                    <h1 class="text-xl font-bold text-gray-900 sm:text-3xl">Your Cart</h1>
                </header>

                <div class="mt-8">
                    <ul class="space-y-4">
                        @forelse ($products as $product)
                            <li class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="size-16 rounded object-cover" />

                                <div>
                                    <h3 class="text-sm text-gray-900">{{ $product->name }}</h3>

                                    <dl class="mt-0.5 space-y-px text-[10px] text-gray-600">
                                        <div>
                                            <dt class="inline">Price:</dt>
                                            <dd class="inline">IDR {{ number_format($product->price, 0, ',', '.'); }}</dd>
                                        </div>

                                        <div>
                                            <dt class="inline">Stock:</dt>
                                            <dd class="inline">{{ $product->stock }}</dd>
                                        </div>
                                    </dl>
                                </div>

                                <div class="flex flex-1 items-center justify-end gap-2">
                                    <form>
                                        <label for="Line1Qty" class="sr-only"> Quantity </label>

                                        <input type="number" min="1" value="{{ $cart[$product->id] }}"
                                            id="Line1Qty"
                                            class="h-8 w-12 rounded border-gray-200 bg-gray-50 p-0 text-center text-xs text-gray-600 [-moz-appearance:_textfield] focus:outline-none [&::-webkit-inner-spin-button]:m-0 [&::-webkit-inner-spin-button]:appearance-none [&::-webkit-outer-spin-button]:m-0 [&::-webkit-outer-spin-button]:appearance-none"
                                            onchange="updateQuantity({{ $product->id }}, this.value)" />
                                    </form>

                                    <button onclick="removeFromCart({{ $product->id }})"
                                        class="text-gray-600 transition hover:text-red-600">
                                        <span class="sr-only">Remove item</span>

                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-4">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>
                                    </button>
                                </div>
                            </li>
                        @empty
                            <p class="text-sm text-gray-600">Your cart is empty.</p>
                        @endforelse
                    </ul>

                    @if (!$products->isEmpty())
                        <div class="mt-8 flex justify-end border-t border-gray-100 pt-8">
                            <div class="w-screen max-w-lg space-y-4">
                                <dl class="space-y-0.5 text-sm text-gray-700">
                                    <dl class="space-y-0.5 text-sm text-gray-700">
                                        <div class="flex justify-between">
                                            <dt>Subtotal</dt>
                                            <dd>IDR {{ number_format($total, 0, ',', '.'); }}</dd>
                                        </div>

                                        <div class="flex justify-between">
                                            <dt>VAT</dt>
                                            <dd>IDR {{ number_format($total * 0.1, 0, ',', '.') }}</dd>
                                        </div>

                                        <div class="flex justify-between !text-base font-medium">
                                            <dt>Total</dt>
                                            <dd>IDR {{ number_format($total * 1.1, 0, ',', '.') }}</dd>
                                        </div>
                                    </dl>
                                </dl>

                                <div class="flex justify-end">
                                    <a href="#" onclick="checkout()"
                                        class="block rounded bg-gray-700 px-5 py-3 text-sm text-gray-100 transition hover:bg-gray-600">
                                        Checkout
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </section>

    <script>
        function removeFromCart(productId) {
            // Tampilkan konfirmasi dengan SweetAlert2
            Swal.fire({
                title: 'Are you sure?',
                text: 'You are about to remove this item from your cart.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, remove it!',
                cancelButtonText: 'No, keep it',
                customClass: {
                    confirmButton: 'bg-red-500 text-white px-4 py-2 rounded mr-2',
                    cancelButton: 'bg-gray-500 text-white px-4 py-2 rounded',
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    // Jika pengguna mengkonfirmasi, hapus item dari keranjang
                    fetch(`/cart/remove/${productId}`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json',
                        },
                    }).then(response => {
                        if (response.ok) {
                            // Tampilkan alert sukses dengan SweetAlert2
                            Swal.fire({
                                icon: 'success',
                                title: 'Removed!',
                                text: 'The item has been removed from your cart.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'bg-blue-500 text-white px-4 py-2 rounded',
                                },
                            }).then(() => {
                                // Reload halaman setelah alert ditutup
                                window.location.href = '/cart';
                            });
                        } else {
                            // Tampilkan alert error dengan SweetAlert2
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'Failed to remove the item.',
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                                },
                            });
                        }
                    }).catch(error => {
                        console.error('Error:', error);
                        // Tampilkan alert error dengan SweetAlert2
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong. Please try again.',
                            confirmButtonText: 'OK',
                            customClass: {
                                confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                            },
                        });
                    });
                }
            });
        }

        function updateQuantity(productId, quantity) {
            fetch(`/cart/update/${productId}`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    quantity: quantity
                }),
            }).then(response => {
                if (response.ok) {
                    // Reload halaman untuk menampilkan total harga yang baru
                    window.location.reload();
                } else {
                    // Tampilkan alert error dengan SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Failed to update quantity',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                        },
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
                // Tampilkan alert error dengan SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong. Please try again.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                    },
                });
            });
        }

        function checkout() {
            fetch('/cart/checkout', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json',
                },
            }).then(response => {
                if (response.ok) {
                    return response.json();
                } else {
                    return response.json().then(error => {
                        throw new Error(error.message || 'Checkout failed');
                    });
                }
            }).then(data => {
                if (data.success) {
                    // Tampilkan alert sukses dengan SweetAlert2
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: 'Your order has been placed successfully.',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-blue-500 text-white px-4 py-2 rounded',
                        },
                    }).then(() => {
                        // Redirect ke halaman thank you setelah alert ditutup
                        window.location.href = `/thankyou/${data.order_id}`;
                    });
                } else {
                    // Tampilkan alert error dengan SweetAlert2
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message || 'Checkout failed',
                        confirmButtonText: 'OK',
                        customClass: {
                            confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                        },
                    });
                }
            }).catch(error => {
                console.error('Error:', error);
                // Tampilkan alert error dengan SweetAlert2
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: error.message || 'Checkout failed. Please try again.',
                    confirmButtonText: 'OK',
                    customClass: {
                        confirmButton: 'bg-red-500 text-white px-4 py-2 rounded',
                    },
                });
            });
        }
    </script>
</x-app-layout>
