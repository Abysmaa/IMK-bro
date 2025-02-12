<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
    <div class="py-12 bg-gray-100">>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-gray-100 overflow-hidden ">
                <div class="p-6 text-gray-900 ">
                    <p>Explore the latest collection of men's, women's and kids' fashion at Zeks Store, offering trendy yet affordable styles. From casual to formal wear, each piece is designed to make you feel confident every day. Discover the latest trends that suit the active and dynamic lifestyle of Indonesian. Shop now and enjoy exclusive offers only at Zeks Store!
                    </p>
                </div>
            </div>
        </div>

        <div class="mx-auto max-w-7xl px-4 sm:px-6">
            <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none">
                <h2 class="text-2xl font-bold text-gray-900">Collections</h2>

                <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
                    @foreach ($categories as $category)
                        <a href="{{ route('category', $category->id) }}">
                            <div class="group relative">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
                                <p class="text-base font-semibold text-gray-900">{{ $category->name }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    
    <div class="bg-gray-100">

    </div>
</x-app-layout>

    


