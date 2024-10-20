</main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const closeMobileMenuButton = document.getElementById('close-mobile-menu');
            const mobileMenu = document.getElementById('mobile-menu');

            function toggleMobileMenu() {
                mobileMenu.classList.toggle('hidden');
            }

            mobileMenuButton.addEventListener('click', toggleMobileMenu);
            closeMobileMenuButton.addEventListener('click', toggleMobileMenu);
        });
    </script>
<footer class="text-center mt-5 fixed bottom-0 w-full mb-5 text-sm text-gray-50">
    <p>&copy; 2024 Cleaf Framework by <a href="https://github.com/satrijo" target="_blank" class="underline">Satriyo</a>
    </p>
</footer>

<body>

    </html>