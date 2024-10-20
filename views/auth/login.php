<?php
require __DIR__ . './../layout/header.php';
?>
<div class="mx-auto w-full items-center flex flex-col justify-center">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-white">Login to your
            account</h2>
        <?php if (!empty($message)): ?>
            <div
                class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm text-white text-center underline flex mx-auto gap-1 items-center justify-center">
                <?= $message ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form class="space-y-6" action="/login" method="POST">
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
                    <!-- <div class="text-sm">
                        <a href="#" class="font-semibold text-indigo-400 hover:text-indigo-300">Forgot
                            password?</a>
                    </div> -->
                </div>
                <div class="mt-2">
                    <input id="password" name="password" type="password" autocomplete="current-password" required
                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div>
                <button type="submit"
                    class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
                    in</button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-400">
            Not a member?
            <a href="/register" class="font-semibold leading-6 text-indigo-400 hover:text-indigo-300">Register</a>
        </p>
    </div>
</div>
<?php
require __DIR__ . './../layout/footer.php';
?>