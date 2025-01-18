<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
  <div class="bg-white py-24 sm:py-32">
    <div class="mx-auto grid max-w-7xl gap-20 px-6 lg:px-8 xl:grid-cols-3">
      <div class="max-w-xl">
        <h2 class="text-pretty text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl">Meet our leadership</h2>
        <p class="mt-6 text-lg/8 text-gray-600">We’re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.</p>
      </div>
      <ul role="list" class="grid gap-x-8 gap-y-12 sm:grid-cols-2 sm:gap-y-16 xl:col-span-2">
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Abiyu Bisma</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">Strategi Market</p>
            </div>
          </div>
        </li>
 <!-- More people... -->
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Dendy Naufal</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">Back - End</p>
            </div>
          </div>
        </li>
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Dhafin Fadila</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">Front - End</p>
            </div>
          </div>
        </li>
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Faris Shidiq</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">Web Designer</p>
            </div>
          </div>
        </li>
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Rapli Zaki</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">CEO of Zeks Store</p>
            </div>
          </div>
        </li>
        <li>
          <div class="flex items-center gap-x-6">
            <img class="size-16 rounded-full" src="img/Abi.jpg" alt="">
            <div>
              <h3 class="text-base/7 font-semibold tracking-tight text-gray-900">Huraira</h3>
              <p class="text-sm/6 font-semibold text-indigo-600">Admin Store</p>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</x-app-layout>