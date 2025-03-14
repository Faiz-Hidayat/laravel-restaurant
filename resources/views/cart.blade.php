<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Restaurant App</title>
    <!-- Favicon  -->
    <link rel="icon" href="{{ url('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // primary: '#66cdaa',
                        // secondary: '#818CF8',
                        // accent: '#C7D2FE',
                        primary: '#008f91',
                        secondary: '#818CF8',
                        accent: '#C7D2FE',
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-gray-50">
    <div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-32">
        <!-- Header -->
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white z-50">
            <div class="flex items-center h-16 px-4 border-b border-gray-100">
                <h1 class="ml-2 text-lg font-medium">Cart</h1>
            </div>
        </div>


        <!-- Main Content -->
        <div class="pt-16 px-4">
            <!-- Store Section -->
            <div class="pt-4">
                <div class="flex items-center gap-2 mb-4">
                    <i class="bi bi-shop text-lg text-primary"></i>
                    <span class="font-medium">Restaurant App</span>
                </div>


                <!-- Cart Items -->
                <div class="space-y-4">
                    <!-- Cart Item 1 -->
                    <div class="flex gap-3 pb-4 border-b border-gray-100">
                        <!-- Checkbox -->
                        <div class="pt-1">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                        </div>


                        <!-- Product Image -->
                        <div class="flex-shrink-0">
                            <img src="https://images.pexels.com/photos/60616/fried-chicken-chicken-fried-crunchy-60616.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                                alt="Nama Produk"
                                class="w-20 h-20 object-cover rounded-lg">
                        </div>


                        <!-- Product Details -->
                        <div class="flex-1">
                            <h3 class="text-sm font-medium line-clamp-2">Nama Produk</h3>
                            <p class="text-xs text-gray-500 mt-1">Stock: 99</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-primary font-semibold">Rp99.000</span>
                                <div class="flex items-center border border-gray-200 rounded-lg">
                                    <button id="decrease-id" class="px-2 py-1 text-gray-500 hover:text-primary">-</button>
                                    <input type="number" id="quantity-id" value="99" class="w-12 text-center border-x border-gray-200 py-1 text-sm" min="1" max="100" step="1">
                                    <button id="increase-id" class="px-2 py-1 text-gray-500 hover:text-primary">+</button>
                                </div>
                            </div>
                            <button class="text-primary text-sm">Hapus</button>
                            <input type="hidden" name="product_id" value="">
                        </div>
                    </div>
                    <!-- Cart Item 1 -->
                    <div class="flex gap-3 pb-4 border-b border-gray-100">
                        <!-- Checkbox -->
                        <div class="pt-1">
                            <input type="checkbox" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                        </div>


                        <!-- Product Image -->
                        <div class="flex-shrink-0">
                            <img src="https://images.pexels.com/photos/13495013/pexels-photo-13495013.jpeg?auto=compress&cs=tinysrgb&w=800"
                                alt="Nama Produk"
                                class="w-20 h-20 object-cover rounded-lg">
                        </div>


                        <!-- Product Details -->
                        <div class="flex-1">
                            <h3 class="text-sm font-medium line-clamp-2">Nama Produk</h3>
                            <p class="text-xs text-gray-500 mt-1">Stock: 99</p>
                            <div class="flex items-center justify-between mt-2">
                                <span class="text-primary font-semibold">Rp99.000</span>
                                <div class="flex items-center border border-gray-200 rounded-lg">
                                    <button id="decrease-id" class="px-2 py-1 text-gray-500 hover:text-primary">-</button>
                                    <input type="number" id="quantity-id" value="99" class="w-12 text-center border-x border-gray-200 py-1 text-sm" min="1" max="100" step="1">
                                    <button id="increase-id" class="px-2 py-1 text-gray-500 hover:text-primary">+</button>
                                </div>
                            </div>
                            <button class="text-primary text-sm">Hapus</button>
                            <input type="hidden" name="product_id" value="">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Changed bottom-0 to bottom-[70px] -->
        <div class="fixed bottom-[70px] left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-100 p-4 z-50">


            <!-- Bottom Section - Price Summary & Checkout -->
            <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-100 p-4 z-50">
                <!-- Price Summary -->
                <div class="flex justify-between items-start mb-4">
                    <div>
                        <p class="text-sm text-gray-600">Total Pembayaran:</p>
                        <p class="text-lg font-semibold text-primary">Rp252.000</p>
                    </div>
                    <div class="text-right">
                        <p class="text-xs text-gray-500">2 Produk</p>
                    </div>
                </div>


                <!-- Checkout Button -->
                <a href="/checkout" class="w-full h-12 flex items-center justify-center rounded-full bg-primary text-white font-medium hover:bg-primary/90 transition-colors">
                    Checkout
                </a>
            </div>


        </div>


        <!-- Bottom Navigation -->
        <nav class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-200 h-[70px] z-50">
            <div class="grid grid-cols-3 h-full">
                <a href="/" class="flex flex-col items-center justify-center text-primary">
                    <i class="bi bi-house text-2xl mb-0.5"></i>
                    <span class="text-xs">Home</span>
                </a>
                <a href="/cart" class="flex flex-col items-center justify-center text-gray-500 hover:text-primary transition-colors">
                    <i class="bi bi-bag text-2xl mb-0.5"></i>
                    <span class="text-xs">Cart</span>
                </a>
                <a href="#" class="flex flex-col items-center justify-center text-gray-500 hover:text-primary transition-colors">
                    <i class="bi bi-receipt text-2xl mb-0.5"></i>
                    <span class="text-xs">Order</span>
                </a>
            </div>
        </nav>
    </div>


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>

</html>