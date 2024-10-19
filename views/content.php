<?php
require __DIR__ . '/layout/header.php';
?>
<div class="w-full min-h-screen flex items-center justify-center py-28 px-6 gap-10">
    <div class="w-full flex items-start justify-center gap-10">
        <div class="max-w-screen-sm w-full items-center flex flex-col justify-center">
            <form method="post" action="/<?= $title ?>/content/create">
                <div class=" space-y-12">
                    <div class="border-b border-white/10 pb-12">
                        <h2 class="text-base font-semibold leading-7 text-white">Pages (You have
                            <?= $countContent  ?>
                            pages left)</h2>
                        <p class="mt-1 text-sm leading-6 text-gray-400">Create a new page or edit an existing page</p>
                        <?php if (!empty($message)): ?>
                        <div
                            class="mt-5 sm:mx-auto sm:w-full sm:max-w-sm text-white text-center underline flex mx-auto gap-1 items-center justify-center">
                            <?= $message ?>
                        </div>
                        <?php endif; ?>
                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                            <div class="sm:col-span-6 grid grid-cols-2 gap-x-6 gap-y-8">
                                <div class="">
                                    <label for="title"
                                        class="block text-sm font-medium leading-6 text-white">Title</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">
                                            <input type="text" name="title" id="title" autocomplete="title" required
                                                class="flex-1 border-0 bg-transparent text-white focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="Personal blog">
                                        </div>
                                    </div>
                                </div>

                                <div class="">
                                    <label for="url" class="block text-sm font-medium leading-6 text-white">Url</label>
                                    <div class="mt-2">
                                        <div
                                            class="flex rounded-md bg-white/5 ring-1 ring-inset ring-white/10 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-500">

                                            <input type="url" name="url" id="url" autocomplete="url" required
                                                class="flex-1 border-0 bg-transparent text-white focus:ring-0 sm:text-sm sm:leading-6"
                                                placeholder="https://satrio.dev">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-span-full">
                                <label for="description"
                                    class="block text-sm font-medium leading-6 text-white">Description</label>
                                <div class="mt-2">
                                    <textarea id="description" name="description" rows="3"
                                        class="block w-full rounded-md border-0 bg-white/5 py-1.5 text-white shadow-sm ring-1 ring-inset ring-white/10 focus:ring-2 focus:ring-inset focus:ring-indigo-500 sm:text-sm sm:leading-6"></textarea>
                                </div>
                                <p class="mt-3 text-sm leading-6 text-gray-400">Write a few sentences about your page.
                                </p>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <button type="button" class="text-sm font-semibold leading-6 text-white">Cancel</button>
                    <button type="submit"
                        class="<?php if ($countContent == 0) : ?> opacity-50 grayscale cursor-not-allowed <?php endif ?>rounded-md bg-indigo-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500"
                        <?php if ($countContent == 0) : ?> disabled <?php endif ?>>Add
                        Page</button>
                </div>
            </form>
        </div>
        <div class="max-w-screen-md w-full">
            <a href="/<?= $page['slug'] ?>"
                class="text-white text-center underline flex mx-auto gap-1 items-center justify-right mb-5">Preview</a>
            <div class="border border-white/10 rounded-md p-5 w-full flex items-start justify-center  h-full">
                <div class="block justify-center text-white text-center">
                    <h1 class="text-white text-xl font-bold mb-2"><?= $page['title'] ?></h1>
                    <p class="text-sm"> <?= $page['description'] ?></p>
                    <div class="mx-auto grid grid-cols-2 gap-x-8 gap-y-8 lg:mx-0 lg:grid-cols-2 text-white mt-10 ">
                        <?php foreach ($contents as $key => $content) : ?>
                        <div class="relative group">
                            <a href="<?= $content['url'] ?>" class="block h-full">
                                <article
                                    class="flex flex-col items-start justify-between border border-gray-700 group-hover:border-gray-500 rounded-md p-5 h-full">
                                    <div class="w-full flex flex-col h-full">
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