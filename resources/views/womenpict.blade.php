<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
</head>
<body>
    <x-navbar></x-navbar>
    <div class="bg-white">
        <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
          <h2 class="text-2xl font-bold tracking-tight text-gray-900">Products</h2>
      
          <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <div class="group relative">
              <img src="img/w1.jpg" alt="Front of men&#039;s Basic Tee in black." class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700">
                    <a href="/cart">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Zeks Sleeve sweater
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Dark Green</p>
                </div>
                <p class="text-sm font-medium text-gray-900">IDR 279.999</p>
              </div>
            </div>
            <div class="group relative">
              <img src="img/w2.jpg" alt="Front of men&#039;s Basic Tee in black." class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700">
                    <a href="/cart">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Zeks Basic Cardigan
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Blue</p>
                </div>
                <p class="text-sm font-medium text-gray-900">IDR 199.999</p>
              </div>
            </div>
            <div class="group relative">
              <img src="img/w3.jpg" alt="Front of men&#039;s Basic Tee in black." class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80">
              <div class="mt-4 flex justify-between">
                <div>
                  <h3 class="text-sm text-gray-700">
                    <a href="/cart">
                      <span aria-hidden="true" class="absolute inset-0"></span>
                      Zeks Star Cardigan
                    </a>
                  </h3>
                  <p class="mt-1 text-sm text-gray-500">Green</p>
                </div>
                <p class="text-sm font-medium text-gray-900">IDR 279.999</p>
              </div>
            </div>
      
            <!-- More products... -->
          </div>
        </div>
      </div>
      
    
</body>
</html>