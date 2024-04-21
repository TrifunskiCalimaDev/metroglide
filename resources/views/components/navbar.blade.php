<?php
    date_default_timezone_set('Atlantic/Canary');
?>

<nav class="bg-black py-4 sm:m-5">
    <div class="container mx-auto flex justify-between">
        <div>
            <a href="/">
                <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="w-24 h-24">
            </a>
        </div>
        <ul class="flex items-center border border-y-white border-x-black">
            <li class="p-2 text-decoration-red"><a href="/" class="text-white">Home</a></li>
            <li class="p-2 text-decoration-red"><a href="/SneakerExplorer" class="text-white">Sneakers</a></li>
            <li class="p-2 text-decoration-red"><a href="/about" class="text-white">About Us</a></li>
            <li class="p-2 text-decoration-red"><a href="/contact" class="text-white">Contact</a></li>
        </ul>
        <div class="flex gap-3 items-center">

            @if (session()->has('token'))
                @if (strtotime(session()->get('token_expired_at')) > strtotime(date('Y-m-d H:i:s')))
                    <a href="/logout"><button class="bg-white font-semibold text-black px-4 py-2 rounded-md hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2">Logout</button></a>
                @else
                    <a href="/login"><button class="bg-white font-semibold text-black px-4 py-2 rounded-md hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2">Login</button></a>
                @endif
            @else
                <a href="/login"><button class="bg-white font-semibold text-black px-4 py-2 rounded-md hover:bg-black hover:text-white hover:ring hover:ring-white transition duration-300 focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-offset-2">Login</button></a>
            @endif

            <a href="/cart">
                <div class="relative" style="display: inline-block;">
                    <x-heroicon-o-shopping-bag id="cart-icon" class="w-6 h-6 cursor-pointer text-white hover:scale-110"></x-heroicon-o-shopping-bag>
                    @if (session()->has('token'))
                        <span id="cart-count" class="hidden absolute -top-2 -right-2 rounded-full bg-red-600 text-white px-1 text-xs"></span>
                    @endif
                </div>
            </a>

        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        updateCartCount();

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalCount = 0;

            // Sumar la cantidad de cada ítem en el carrito
            cart.forEach(item => {
                totalCount += item.quantity;
            });

            // Mostrar el total en el icono del carrito
            const cartCountElement = document.getElementById('cart-count');
            if (totalCount > 0) {
                cartCountElement.textContent = totalCount;
                cartCountElement.classList.remove('hidden');
            } else {
                cartCountElement.classList.add('hidden');
            }
        }
    });
</script>

