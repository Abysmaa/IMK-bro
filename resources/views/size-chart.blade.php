
<x-app-layout>
      <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>
  <div class="bg-gray-100">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="mx-auto max-w-2xl py-16 sm:py-24 lg:max-w-none lg:py-32">
        <h2 class="text-2xl font-bold text-gray-900"></h2>
  
        <div class="mt-6 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-6 lg:space-y-0">
          <div class="group relative">
            <img src="img/sizemen.jpg" alt="Desk with leather desk pad, walnut desk organizer, wireless keyboard and mouse, and porcelain mug." class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
            <h3 class="mt-6 text-sm text-gray-500">
              <a href="#">
                <span class="absolute inset-0"></span>
                Man Size
              </a>
            </h3>
            <p class="text-base font-semibold text-gray-900">Chest = 60cm <br> High Shoulder = 72cm <br> sleeve = 24cm <br>  </p>
          </div>
          <div class="group relative">
            <img src="img/sizewomen.jpg" alt="Wood table with porcelain mug, leather journal, brass pen, leather key ring, and a houseplant." class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
            <h3 class="mt-6 text-sm text-gray-500">
              <a href="#">
                <span class="absolute inset-0"></span>
                Woman Size
              </a>
            </h3>
            <p class="text-base font-semibold text-gray-900">Chest = 50cm <br> High Shoulder = 62cm <br> sleeve = 18cm <br> </p>
          </div>
          <div class="group relative">
            <img src="img/sizekids.jpg" alt="Collection of four insulated travel bottles on wooden shelf." class="w-full rounded-lg bg-white object-cover group-hover:opacity-75 max-sm:h-80 sm:aspect-[2/1] lg:aspect-square">
            <h3 class="mt-6 text-sm text-gray-500">
              <a href="#">
                <span class="absolute inset-0"></span>
                Kids Size
              </a>
            </h3>
            <p class="text-base font-semibold text-gray-900">Chest = 60cm <br> High Shoulder = 72cm <br> sleeve = 24cm <br> </p>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</x-lyout>