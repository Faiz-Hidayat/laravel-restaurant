<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://devstudioid.com/favicon.ico">
    <title>Product Detail - Fashion Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#008f91',
                        secondary: '#818CF8',
                        accent: '#C7D2FE',
                    }
                }
            }
        };


        // IndexedDB setup
        let db;
        const request = indexedDB.open("ProductDB", 1);


        request.onupgradeneeded = function(event) {
            db = event.target.result;
            const objectStore = db.createObjectStore("products", {
                keyPath: "slug"
            });
        };


        request.onsuccess = function(event) {
            db = event.target.result;
        };


        function saveProduct(product) {
            const transaction = db.transaction(["products"], "readwrite");
            const objectStore = transaction.objectStore("products");
            const request = objectStore.put(product);


            // Show loading indicator
            document.getElementById('loading').classList.remove('hidden');


            request.onsuccess = function() {
                // Hide loading indicator
                document.getElementById('loading').classList.add('hidden');
                // Show success message
                alert("Product saved successfully!");
            };


            request.onerror = function() {
                // Hide loading indicator
                document.getElementById('loading').classList.add('hidden');
                alert("Error saving product.");
            };
        }
    </script>
</head>

<body class="bg-gray-50">
    <div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-[70px]">
        <!-- Header with Back Button -->
        <div class="fixed top-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white z-50">
            <div class="flex items-center h-16 px-4 border-b border-gray-100">
                <button onclick="history.back()" class="p-2 hover:bg-gray-50 rounded-full">
                    <i class="bi bi-arrow-left text-xl"></i>
                </button>
                <h1 class="ml-2 text-lg font-medium">Detail Produk</h1>
            </div>
        </div>


        <!-- Loading Indicator -->
        <div id="loading" class="fixed top-0 left-0 w-full h-full bg-white bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-primary"></div>
        </div>


        <!-- Main Content -->
        <div class="pt-16">
            <!-- Product Images Slider -->
            <div class="relative bg-gray-100 h-[400px]">
                <img id="product-image" class="w-full h-full object-cover">
            </div>


            <!-- Product Info -->
            <div class="p-4 border-b border-gray-100">
                <div class="flex items-start justify-between gap-4">
                    <div>
                        <h2 id="product-name" class="text-xl font-semibold text-gray-800"></h2>
                        <div class="mt-1 flex items-baseline gap-2">
                            <span id="product-price" class="text-2xl font-bold text-primary"></span>
                        </div>
                    </div>
                    <button class="p-2 hover:bg-gray-50 rounded-full" onclick="addToCart()">
                        <i class="bi bi-cart text-xl text-gray-600"></i>
                    </button>
                </div>
                <!-- Quantity Input -->
                <div class="mt-4">
                    <label for="quantity" class="block text-sm font-medium text-gray-700">Quantity:</label>
                    <input type="number" id="quantity" value="1" min="1" class="mt-1 w-full border border-gray-300 rounded-md p-2">
                </div>
            </div>


            <!-- Product Description -->
            <div class="p-4 border-b border-gray-100">
                <h3 class="text-lg font-semibold mb-3">Deskripsi Produk</h3>
                <div id="product-description" class="space-y-2 text-gray-600 text-sm"></div>
            </div>
        </div>


        <!-- Bottom Navigation for Add to Cart & Buy -->
        <div class="fixed bottom-0 left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-100 p-4 z-50">
            <div class="flex gap-3">
                <button class="flex-1 h-12 flex items-center justify-center rounded-full border border-primary text-primary font-medium hover:bg-primary hover:text-white transition-colors" onclick="saveProductToDB()">
                    Add to Cart
                </button>
                <a href="/cart" class="flex-1 h-12 flex items-center justify-center rounded-full bg-primary text-white font-medium hover:bg-primary/90 transition-colors">
                    Go to Cart
                </a>
            </div>
        </div>
    </div>


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const url = `{{ config('app.google_apps_script_url') }}?slug={{ $slug }}`;
            const loadingIndicator = document.getElementById('loading');
            const productDescription = document.getElementById('product-description');


            function displayProduct(product) {
                document.getElementById('product-image').src = product.image;
                document.getElementById('product-image').alt = product.name;
                document.getElementById('product-name').textContent = product.name;
                document.getElementById('product-price').textContent = `Rp${product.price.toLocaleString('id-ID')}`;
                productDescription.innerHTML = `<p>${product.description}</p>`;
            }


            function displayError(message) {
                productDescription.innerHTML = `<p class="text-red-500">${message}</p>`;
            }


            function loadProduct() {
                loadingIndicator.classList.remove('hidden');


                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.meta.success) {
                            const product = data.data;
                            displayProduct(product);
                        } else {
                            console.error('Failed to fetch product details:', data.meta.message);
                            displayError(data.meta.message);
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching product details:', error);
                        displayError(error.message);
                    })
                    .finally(() => {
                        loadingIndicator.classList.add('hidden');
                    });
            }


            loadProduct();
        });


        function addToCart() {
            alert("Product added to cart!");
        }


        function saveProductToDB() {
            const quantity = document.getElementById('quantity').value;
            const product = {
                slug: `{{ $slug }}`,
                name: document.getElementById('product-name').textContent,
                price: parseFloat(document.getElementById('product-price').textContent.replace('Rp', '').replace(/\./g, '')),
                image: document.getElementById('product-image').src,
                description: document.getElementById('product-description').innerText,
                quantity: parseInt(quantity)
            };
            saveProduct(product);
        }
    </script>
</body>

</html>