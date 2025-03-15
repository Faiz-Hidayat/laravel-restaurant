<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Restaurant App</title>
    <!-- Favicon  -->
    <link rel="icon" href="https://devstudioid.com/favicon.ico">
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


        request.onsuccess = function(event) {
            db = event.target.result;
            loadCartItems();
        };


        function loadCartItems() {
            const transaction = db.transaction(["products"], "readonly");
            const objectStore = transaction.objectStore("products");
            const request = objectStore.getAll();


            request.onsuccess = function(event) {
                const products = event.target.result;
                displayCartItems(products);
                calculateTotals(products);
            };
        }


        function displayCartItems(products) {
            const cartItemsContainer = document.getElementById('cart-items');
            cartItemsContainer.innerHTML = '';


            products.forEach(product => {
                const itemHTML = `
                   <div class="flex gap-3 pb-4 border-b border-gray-100" data-id="${product.id}">
                       <div class="flex-shrink-0">
                           <img src="${product.image}" alt="${product.name}" class="w-20 h-20 object-cover rounded-lg">
                       </div>
                       <div class="flex-1">
                           <h3 class="text-sm font-medium line-clamp-2">${product.name}</h3>
                           <p class="text-xs text-gray-500 mt-1">Quantity: ${product.quantity}</p>
                           <div class="flex items-center justify-between mt-2">
                               <span class="text-primary font-semibold">Rp${(product.price).toLocaleString('id-ID')}</span>
                               <div class="flex items-center border border-gray-200 rounded-lg">
                                   <button class="px-2 py-1 text-gray-500 hover:text-primary">-</button>
                                   <input type="number" value="${product.quantity}" class="w-12 text-center border-x border-gray-200 py-1 text-sm" min="1" max="100" step="1" disabled>
                                   <button class="px-2 py-1 text-gray-500 hover:text-primary">+</button>
                               </div>
                           </div>
                           <button class="text-primary text-sm delete-button">Hapus</button>
                           <input type="hidden" name="product_id" value="${product.slug}"> <!-- Menggunakan slug sebagai kunci -->
                       </div>
                   </div>
               `;
                cartItemsContainer.innerHTML += itemHTML;
            });


            // Add event listeners to delete buttons
            const deleteButtons = document.querySelectorAll('.delete-button');
            deleteButtons.forEach(button => {
                button.addEventListener('click', handleDelete);
            });
        }


        function handleDelete(event) {
            const button = event.target;
            const cartItem = button.closest('.flex');
            const productSlug = cartItem.querySelector('input[name="product_id"]').value; // Mengambil slug


            // Show loading effect
            button.textContent = 'Menghapus...';
            button.disabled = true;


            const transaction = db.transaction(["products"], "readwrite");
            const objectStore = transaction.objectStore("products");
            const request = objectStore.delete(productSlug); // Menggunakan slug sebagai kunci


            request.onsuccess = function() {
                // Remove the item from the UI
                cartItem.remove();
                loadCartItems(); // Reload cart items to update totals
            };


            request.onerror = function() {
                alert('Error deleting item. Please try again.');
                button.textContent = 'Hapus';
                button.disabled = false;
            };
        }


        function calculateTotals(products) {
            let totalPrice = 0;
            let totalQuantity = 0;


            products.forEach(product => {
                totalPrice += product.price * product.quantity;
                totalQuantity += product.quantity;
            });


            document.getElementById('total-price').textContent = `Rp${totalPrice.toLocaleString('id-ID')}`;
            document.getElementById('total-quantity').textContent = `${totalQuantity} Quantity`;
        }


        function checkout() {
            const transaction = db.transaction(["products"], "readonly");
            const objectStore = transaction.objectStore("products");
            const request = objectStore.getAll();


            request.onsuccess = function(event) {
                const products = event.target.result;
                let message = "Pesanan Anda:\n\nAtas Nama: Tulis Nama Anda\n\n";


                products.forEach(product => {
                    message += `${product.name} - Quantity: ${product.quantity} - Rp${(product.price * product.quantity).toLocaleString('id-ID')}\n`;
                });


                message += `\nTotal: Rp${document.getElementById('total-price').textContent.replace('Rp', '').replace('.', '')}`;


                // Encode the message for the URL
                const encodedMessage = encodeURIComponent(message);
                const whatsappUrl = `https://wa.me/6281293922428?text=${encodedMessage}`;


                // Redirect to WhatsApp
                window.open(whatsappUrl, '_blank');
            };
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
            <div class="pt-4">
                <div class="flex items-center gap-2 mb-4">
                    <i class="bi bi-shop text-lg text-primary"></i>
                    <span class="font-medium">Restaurant App</span>
                </div>


                <!-- Cart Items -->
                <div id="cart-items" class="space-y-4">
                    <!-- Cart items will be dynamically inserted here -->
                </div>
            </div>
        </div>


        <div class="fixed bottom-[70px] left-1/2 -translate-x-1/2 w-full max-w-[480px] bg-white border-t border-gray-100 p-4 z-50">
            <div class="flex justify-between items-start mb-4">
                <div>
                    <p class="text-sm text-gray-600">Total Price:</p>
                    <p id="total-price" class="text-lg font-semibold text-primary">Rp0</p>
                </div>
                <div class="text-right">
                    <p id="total-quantity" class="text-xs text-gray-500">0 Quantity</p>
                </div>
            </div>


            <button onclick="checkout()" class="w-full h-12 flex items-center justify-center rounded-full bg-primary text-white font-medium hover:bg-primary/90 transition-colors">
                Checkout
            </button>
        </div>


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


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</body>

</html>