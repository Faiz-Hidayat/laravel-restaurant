<!DOCTYPE html>
<html lang="id">

<head>
    @PwaHead <!-- Add this directive to include the PWA meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://devstudioid.com/favicon.ico">
    <title>Restaurant App</title>
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
        }
    </script>
</head>

<body class="bg-gray-50">
    <!-- Main Container -->
    <div class="max-w-[480px] mx-auto bg-white min-h-screen relative shadow-lg pb-[70px]">
        <!-- Loading Indicator -->
        <div id="loading" class="fixed top-0 left-0 w-full h-full bg-white bg-opacity-75 flex items-center justify-center z-50 hidden">
            <div class="animate-spin rounded-full h-16 w-16 border-b-4 border-primary"></div>
        </div>


        <!-- Banner -->
        <div class="h-[180px] relative overflow-hidden bg-gradient-to-br from-primary to-secondary">
            <div class="absolute inset-0 opacity-50 pattern-dots"></div>
        </div>


        <!-- Profile Section -->
        <div class="px-5 relative -mt-10">
            <div class="w-[90px] h-[90px] bg-gradient-to-br from-primary to-secondary rounded-[20px] flex items-center justify-center shadow-lg transform rotate-[5deg]">
                <img src="https://devstudioid.com/favicon.ico" alt="Store"
                    class="w-[45px] h-[45px] brightness-0 invert transform -rotate-[5deg]">
            </div>
            <h4 class="mt-3 mb-1 text-gray-800 font-semibold text-xl">Restaurant App</h4>
            <p class="text-gray-500 text-sm">Discover the latest collection of dishes with various taste choices and interesting menus.</p>
        </div>


        <!-- Navigation Tabs -->
        <div class="mt-5 px-2.5 overflow-x-auto hide-scrollbar">
            <div class="flex gap-2.5 pb-2.5 whitespace-nowrap">
                <button class="category-button px-6 h-10 flex items-center rounded-full bg-primary text-white border border-primary" data-category="All">
                    All
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Rice">
                    Rice
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Satay">
                    Satay
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Noodles">
                    Noodles
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Vegetables">
                    Vegetables
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Meat">
                    Meat
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Snacks">
                    Snacks
                </button>
                <button class="category-button px-6 h-10 flex items-center rounded-full text-gray-600 border border-gray-200 hover:border-primary hover:text-primary transition-colors" data-category="Beverages">
                    Beverages
                </button>
            </div>
        </div>


        <div class="p-3">
            <div class="grid grid-cols-2 gap-3" id="product-container">
                <!-- Product Cards will be dynamically inserted here -->
            </div>
        </div>


        <!-- Pagination -->
        <div class="flex justify-center mt-4 mb-4">
            <button id="prev-page" class="px-4 py-2 bg-primary text-white rounded-l-lg disabled:bg-gray-300 disabled:text-gray-500 hover:bg-primary-dark" disabled>
                &lt; Prev
            </button>
            <span id="page-info" class="px-4 py-2 bg-white border border-gray-200 text-gray-700"></span>
            <button id="next-page" class="px-4 py-2 bg-primary text-white rounded-r-lg disabled:bg-gray-300 disabled:text-gray-500 hover:bg-primary-dark" disabled>
                Next &gt;
            </button>
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


    <!-- Hide Scrollbar Style -->
    <style>
        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .pattern-dots {
            background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23ffffff' fill-opacity='0.1' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .loader {
            font-size: 1.5rem;
            color: #008f91;
            /* Warna sesuai dengan tema */
        }
    </style>


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const url = `{{ config('app.google_apps_script_url') }}`;

            const loadingIndicator = document.getElementById('loading');
            const productContainer = document.getElementById('product-container');
            const prevPageButton = document.getElementById('prev-page');
            const nextPageButton = document.getElementById('next-page');
            const pageInfo = document.getElementById('page-info');
            const categoryButtons = document.querySelectorAll('.category-button');


            let allProducts = []; // Menyimpan semua produk
            let filteredProducts = []; // Produk yang difilter
            let currentPage = 1;
            const productsPerPage = 4;
            let selectedCategory = 'All'; // Default menampilkan semua produk


            function displayProducts(page) {
                productContainer.innerHTML = '';


                const start = (page - 1) * productsPerPage;
                const end = start + productsPerPage;
                const paginatedProducts = filteredProducts.slice(start, end);


                paginatedProducts.forEach(product => {
                    const newTag = product.tag !== '' ? `
                       <span class="absolute top-2.5 left-2.5 bg-primary/90 text-white text-xs font-medium px-3 py-1 rounded-full">
                           ${product.tag}
                       </span>
                   ` : '';
                    const productCard = `
                       <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:-translate-y-1 transition-transform duration-300">
                           <a href="product/${product.slug}">
                               <div class="relative">
                                   ${newTag}
                                   <img src="${product.image}" alt="${product.name}" class="w-full h-[180px] object-cover">
                               </div>
                               <div class="p-3">
                                   <h6 class="text-sm font-medium text-gray-700 line-clamp-2">${product.name}</h6>
                                   <div class="mt-2 flex items-center gap-1">
                                       <span class="text-xs text-gray-500">Rp</span>
                                       <span class="text-primary font-semibold">${product.price}</span>
                                   </div>
                               </div>
                           </a>
                       </div>
                   `;
                    productContainer.insertAdjacentHTML('beforeend', productCard);
                });


                pageInfo.textContent = `Page ${page} from ${Math.ceil(filteredProducts.length / productsPerPage)}`;


                prevPageButton.disabled = page === 1;
                nextPageButton.disabled = page === Math.ceil(filteredProducts.length / productsPerPage);
            }


            function filterProducts(category) {
                selectedCategory = category;
                currentPage = 1; // Reset ke halaman pertama setiap filter diubah


                if (category === 'All') {
                    filteredProducts = allProducts;
                } else {
                    filteredProducts = allProducts.filter(product => product.category === category);
                }


                displayProducts(currentPage);
            }


            function loadProducts() {
                loadingIndicator.classList.remove('hidden');


                fetch(url)
                    .then(response => response.json())
                    .then(data => {
                        if (data.meta.success) {
                            allProducts = data.data;
                            filteredProducts = allProducts;
                            displayProducts(currentPage);
                        } else {
                            console.error('Failed to fetch products:', data.meta.message);
                            displayError(data.meta.message);
                        }
                    })
                    .catch(error => console.error('Error fetching data:', error))
                    .finally(() => {
                        loadingIndicator.classList.add('hidden');
                    });
            }


            prevPageButton.addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    displayProducts(currentPage);
                }
            });


            nextPageButton.addEventListener('click', () => {
                if (currentPage < Math.ceil(filteredProducts.length / productsPerPage)) {
                    currentPage++;
                    displayProducts(currentPage);
                }
            });


            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const category = this.getAttribute('data-category');
                    filterProducts(category);


                    categoryButtons.forEach(btn => {
                        btn.classList.remove("bg-primary", "text-white", "hover:border-primary", "hover:text-primary", "transition-colors");
                    });
                    this.classList.add("bg-primary", "text-white");
                });
            });


            loadProducts();
        });
    </script>
    @RegisterServiceWorkerScript <!-- This registers the service worker -->
</body>

</html>