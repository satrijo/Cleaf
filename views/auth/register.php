<?php
require __DIR__ . './../layout/header.php';
?>
<div class="mx-auto w-full items-center flex flex-col justify-center">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Register your
            account</h2>
        <?php if (!empty($message)): ?>
        <div
            class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm text-white text-center underline flex mx-auto gap-1 items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 text-red-600">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
            <?= $message ?>
        </div>
        <?php endif; ?>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/register" method="POST">
            <div>
                <label for="name" class="block text-sm font-medium leading-6 text-white">Name</label>
                <div class="mt-2">
                    <input id="name" name="name" type="text" autocomplete="name" required
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium leading-6 text-white">Email address</label>
                <div class="mt-2">
                    <input id="email" name="email" type="email" autocomplete="email" required
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-white">Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium leading-6 text-white">Confirm
                        Password</label>
                </div>
                <div class="mt-2">
                    <input id="password" name="confirm_password" type="password" autocomplete="current-password"
                        required
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Register</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-400">
            Already have an account?
            <a href="/login" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Log in</a>
        </p>
    </div>
</div>
<?php
require __DIR__ . './../layout/footer.php';
?>