<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="bg-gray-100">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
                <h2 class="text-2xl font-bold text-gray-900">Thank You!</h2>
                <p class="mt-4 text-gray-600">Your order has been placed successfully.</p>

                <!-- Tampilkan detail order -->
                <div class="mt-8">
                    <h3 class="text-xl font-bold text-gray-900">Order Details</h3>
                    <div class="mt-4 space-y-4">
                        @foreach ($order->items as $item)
                            <div class="flex items-center gap-4">
                                <img src="{{ asset('storage/' . $item->product->image) }}"
                                    alt="{{ $item->product->name }}" class="size-16 rounded object-cover" />
                                <div>
                                    <h4 class="text-sm text-gray-900">{{ $item->product->name }}</h4>
                                    <p class="text-xs text-gray-600">Quantity: {{ $item->quantity }}</p>
                                    <p class="text-xs text-gray-600">Price: IDR {{ number_format($item->price, 0, ',', '.'); }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Tampilkan total harga -->
                    <div class="mt-8">
                        <h4 class="text-lg font-bold text-gray-900">Order Summary</h4>
                        <dl class="mt-2 space-y-2 text-sm text-gray-700">
                            <div class="flex justify-between">
                                <dt>Subtotal</dt>
                                <dd>IDR {{ number_format($order->total_price, 0, ',', '.'); }}</dd>
                            </div>

                            <div class="flex justify-between">
                                <dt>VAT</dt>
                                <dd>IDR {{ number_format($order->total_price * 0.1, 0, ',', '.') }}</dd>
                            </div>

                            <div class="flex justify-between !text-base font-medium">
                                <dt>Total</dt>
                                <dd>IDR {{ number_format($order->total_price * 1.1, 0, ',', '.') }}</dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
