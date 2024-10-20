<?php
require __DIR__ . '/layout/header.php';
?>
<div class="w-full min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-7xl flex flex-col lg:flex-row items-start justify-center gap-10">
        <div class="w-full lg:w-1/2">
            <form method="post" action="/<?= $title ?>/content/create">
                <div class="space-y-8">
                    <div class="border-b border-white/10 pb-8">
                        <h2 class="text-base font-semibold leading-7 text-white">Pages (You have <?= $countContent ?>
                            pages left)</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">Create a new page or edit an existing page</p>
                        <?php if (!empty($message)): ?>
                            <div
                                class="mt-5 text-white text-center underline flex mx-auto gap-1 items-center justify-center">
                                <?= $message ?>
                            </div>
                        <?php endif; ?>
                        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-2">
                            <div class="sm:col-span-1">
                                <label for="title" class="block text-sm font-medium leading-6 text-white">Title</label>
                                <div class="mt-2">
                                    <input type="text" name="title" id="title" autocomplete="title" required
                                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                                        placeholder="Personal blog">
                                </div>
                            </div>

                            <div class="sm:col-span-1">
                                <label for="url" class="block text-sm font-medium leading-6 text-white">Url</label>
                                <div class="mt-2">
                                    <input type="url" name="url" id="url" autocomplete="url" required
                                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"
                                        placeholder="https://satrio.dev">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-white">Cancel</button>
                    <button type="submit"
                        class="<?php if ($countContent == 0) : ?> opacity-50 grayscale cursor-not-allowed <?php endif ?>rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        <?php if ($countContent == 0) : ?> disabled <?php endif ?>>Add Page</button>
                </div>
            </form>
        </div>
        <div class="w-full lg:w-1/2 mt-10 lg:mt-0">
            <a href="/<?= $page['slug'] ?>" class="text-white text-center underline flex justify-end mb-5">Preview</a>
            <div class="border border-white/10 rounded-md p-5 w-full">
                <div class="text-white text-center">
                    <h1 class="text-xl font-bold mb-2"><?= $page['title'] ?></h1>
                    <p class="text-sm mb-6"><?= $page['description'] ?></p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <?php foreach ($contents as $key => $content) : ?>
                            <div class="relative group">
                                <a href="<?= $content['url'] ?>" class="block h-full">
                                    <article
                                        class="flex flex-col items-start justify-between border border-gray-700 group-hover:border-gray-500 rounded-md p-4 h-full">
                                        <div class="w-full">
                                            <h3 class="text-lg group-hover:text-gray-300">
                                                <?= $content['title'] ?>
                                            </h3>
                                        </div>
                                    </article>
                                </a>
                                <form action="/<?= $title ?>/content/delete/<?= $content['id'] ?>" method="POST"
                                    class="absolute top-2 right-2"
                                    onsubmit="return confirm('Are you sure you want to delete this content?');">
                                    <button type="submit"
                                        class="p-1 bg-red-600 text-white rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-200 ease-in-out hover:bg-red-900">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require __DIR__ . '/layout/footer.php';
?>