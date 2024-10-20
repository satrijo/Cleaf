<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= ucwords($title) ?? 'Cleaf Framework' ?></title>

    <link rel="stylesheet" href="/assets/main.css">
</head>

<body class="font-sans mx-auto min-h-screen">
    <?php if (isset($_SESSION['user_id'])): ?>
    <header class="absolute inset-x-0 top-0 z-50">
        <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
            <div class="flex lg:flex-1">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Cleaf Framework</span>
                    <img class="h-8 w-auto" src="/assets/icons/leaf.svg" alt="">
                </a>
            </div>
            <div class="flex lg:hidden">
                <button type="button" id="mobile-menu-button"
                    class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-400">
                    <span class="sr-only">Open main menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                        aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            <div class="hidden lg:flex lg:gap-x-12">
                <?php if (isset($_SESSION['user_name'])): ?>
                <a href="/" class="text-sm font-semibold leading-6 text-white">Home</a>
                <a href="/pages" class="text-sm font-semibold leading-6 text-white">Pages</a>
                <a href="/pricing" class="text-sm font-semibold leading-6 text-white">Pricing</a>
                <a href="/contact" class="text-sm font-semibold leading-6 text-white">Contact Us</a>
                <?php endif; ?>
            </div>
            <div class="hidden lg:flex lg:flex-1 lg:justify-end">
                <?php if (isset($_SESSION['user_name'])): ?>
                <span class="text-sm font-semibold leading-6 text-white">Hi,
                    <?= explode(" ", $_SESSION['user_name'])[0] ?> - </span>
                <a href="/logout" class="ml-2 text-sm font-semibold leading-6 text-white">
                    Log out <span aria-hidden="true">&rarr;</span>
                </a>
                <?php else: ?>
                <a href="/login" class="text-sm font-semibold leading-6 text-white">
                    Log in <span aria-hidden="true">&rarr;</span>
                </a>
                <?php endif; ?>
            </div>
        </nav>
        <!-- Mobile menu, show/hide based on menu open state. -->
        <div id="mobile-menu" class="lg:hidden hidden" role="dialog" aria-modal="true">
            <!-- Background backdrop, show/hide based on slide-over state. -->
            <div class="fixed inset-0 z-50"></div>
            <div
                class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-gray-900 px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-white/10">
                <div class="flex items-center justify-between">
                    <a href="#" class="-m-1.5 p-1.5">
                        <span class="sr-only">Cleaf Framework</span>
                        <img class="h-8 w-auto" src="/assets/icons/leaf.svg" alt="">
                    </a>
                    <button type="button" id="close-mobile-menu" class="-m-2.5 rounded-md p-2.5 text-gray-400">
                        <span class="sr-only">Close menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="mt-6 flow-root">
                    <div class="-my-6 divide-y divide-gray-500/25">
                        <div class="space-y-2 py-6">
                            <?php if (isset($_SESSION['user_name'])): ?>
                            <a href="/"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Home</a>
                            <a href="/pages"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Pages</a>
                            <a href="/pricing"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Pricing</a>
                            <a href="/contact"
                                class="-mx-3 block rounded-lg px-3 py-2 text-base font-semibold leading-7 text-white hover:bg-gray-800">Contact
                                Us</a>
                            <?php endif; ?>
                        </div>
                        <div class="py-6">
                            <?php if (isset($_SESSION['user_name'])): ?>
                            <span class="text-sm font-semibold leading-6 text-white">Hi,
                                <?= explode(" ", $_SESSION['user_name'])[0] ?> - </span>
                            <a href="/logout"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">Log
                                out</a>
                            <?php else: ?>
                            <a href="/login"
                                class="-mx-3 block rounded-lg px-3 py-2.5 text-base font-semibold leading-7 text-white hover:bg-gray-800">Log
                                in</a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <?php endif; ?>
    <main class="max-h-screen flex items-center justify-center bg-gray-900">
        <!-- Main content goes here -->