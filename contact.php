<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-blue-50 dark:bg-slate-800">
    <?php echo file_get_contents("navbar.html"); ?>
<div class="mrg10"></div>
    <section class="py-16 sm:py-20" id="contact">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h1 class="text-3xl font-semibold uppercase tracking-wide text-blue-600 dark:text-blue-200">
                    Contact
                </h1>
                
                <p class="mt-4 text-xl text-gray-600 dark:text-slate-400 max-w-3xl mx-auto">
                    Une question ? N'hésitez pas ! 
                </p>
            </div>

            <div class="flex flex-col md:flex-row items-stretch justify-center space-y-8 md:space-y-0 md:space-x-8">
                <!-- Contact Details -->
                <div class="flex-1 bg-white dark:bg-slate-700 p-6 rounded-lg shadow-md">
                    <p class="mb-8 text-lg text-gray-600 dark:text-slate-400">
                        Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis
                        nec ipsum orci. Ut scelerisque sagittis ante, ac tincidunt sem venenatis ut.
                    </p>
                    <ul>
                        <li class="flex mb-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                    <path
                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z">
                                    </path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium leading-6 text-black">Our Address</h3>
                                <p class="text-gray-600 dark:text-slate-400">1230 Maecenas Street Donec Road</p>
                                <p class="text-gray-600 dark:text-slate-400">New York, EEUU</p>
                            </div>
                        </li>
                        <li class="flex mb-6">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2"></path>
                                    <path d="M15 7a2 2 0 0 1 2 2"></path>
                                    <path d="M15 3a6 6 0 0 1 6 6"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Contact</h3>
                                <p class="text-gray-600 dark:text-slate-400">Mobile: +1 (123) 456-7890</p>
                                <p class="text-gray-600 dark:text-slate-400">Mail: tailnext@gmail.com</p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex h-10 w-10 items-center justify-center rounded bg-blue-900 text-gray-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="h-6 w-6">
                                    <path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0"></path>
                                    <path d="M12 7v5l3 3"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium leading-6 text-gray-900 dark:text-white">Working hours
                                </h3>
                                <p class="text-gray-600 dark:text-slate-400">Monday - Friday: 08:00 - 17:00</p>
                                <p class="text-gray-600 dark:text-slate-400">Saturday &amp; Sunday: 08:00 - 12:00</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- Contact Form -->
                <div class="flex-1 bg-white dark:bg-slate-700 p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 dark:text-white">Ready to Get Started?</h2>
    <form id="contactForm" class="space-y-4 flex-col">
        <div>
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">NOM Prénom</label>
            <input type="text" id="name" name="name" autocomplete="given-name" placeholder="Votre nom et prénom" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">
        </div>
        <div>
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
            <input type="email" id="email" name="email" autocomplete="email" placeholder="Votre email" class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300">
        </div>
        <div>
            <label for="textarea" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
            <textarea id="textarea" name="textarea" rows="4" placeholder="Saisir votre message..." class="mt-1 p-2 w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 dark:bg-slate-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-300"></textarea>
        </div>
        <div class="text-center">
            <button type="submit" class="w-full bg-blue-500 text-white px-4 py-2 font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Envoyer</button>
        </div>
    </form>
</div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php echo file_get_contents("footer.html"); ?>
</body>

</html>
