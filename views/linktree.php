 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title><?= ucwords($title) ?? 'Cleaf Framework' ?></title>

     <link rel="stylesheet" href="/assets/main.css">
 </head>

 <body class="font-sans mx-auto">
     <main class="min-h-screen flex items-center justify-center bg-gray-900">
         <div class="max-w-3xl mx-auto lg:max-w-screen-md w-full px-5">
             <div class="border border-white/10 rounded-md p-5 w-full flex items-start justify-center h-full">
                 <div class="block justify-center text-white text-center">
                     <h1 class="text-white text-xl font-bold mb-2"><?= $page['title'] ?></h1>
                     <p class="text-sm"> <?= $page['description'] ?></p>
                     <div class="mx-auto grid grid-cols-1 lg:gap-8 gap-4 lg:mx-0 lg:grid-cols-2 text-white mt-10">
                         <?php foreach ($contents as $key => $content) : ?>
                         <div class="relative group">
                             <a href="<?= $content['url'] ?>" class="block h-full">
                                 <article
                                     class="flex flex-col items-start justify-between border border-gray-700 group-hover:border-gray-500 rounded-md p-5 h-full">
                                     <div class="w-full flex flex-col h-full">
                                         <h3 class="text-md lg:text-lg group-hover:text-gray-300">
                                             <?= $content['title'] ?>
                                         </h3>
                                     </div>
                                 </article>
                             </a>
                         </div>
                         <?php endforeach; ?>
                     </div>
                 </div>
             </div>
         </div>


         <?php
            require __DIR__ . '/layout/footer.php';
            ?>