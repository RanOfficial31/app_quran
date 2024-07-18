<?php

$data = file_get_contents('data/dzikir-setelah-sholat.json');
$get = json_decode($data, true);

$get_out = $get["dzikir"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Qur'an</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="font.css">
</head>
<style>
    html {
        scroll-behavior: smooth;
    }

    /* scroll bar */
    /* width and height */
    ::-webkit-scrollbar {
        width: 6px;
        height: 6px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        border-radius: 8px;
        background: #ecf0f3;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #ea580c;
        border-radius: 10px;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #f97316;
    }

    .arabic {
        font-family: "Scheherazade New", serif;
        font-weight: 520;
        font-style: normal;
        line-height: 3;
    }
</style>

<body class="bg-[#ecf0f3]">
    <!-- navbar start -->
    <nav class="mb-8 bg-[#ecf0f3] py-5 shadow-xl sticky top-0 z-10 mb-2">
        <div class="container w-full mx-auto px-2">
            <div class="mx-2 flex flex-wrap items-center justify-between">

                <a href="#" class="flex">
                    <div class="max-w-2xl mx-auto">
                        <form>
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-700" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <input type="search" id="searchInput"
                                    class="block p-2 pl-10 w-full text-md font-semibold text-gray-900 bg-[#ecf0f3] rounded-lg  focus outline-none shadow-[inset_9px_9px_15px_#cbced1,inset_-9px_-9px_15px_#fff]"
                                    placeholder="Cari" required>
                            </div>
                        </form>
                    </div>
                </a>

                <div class="flex md:hidden md:order-2">
                    <button data-collapse-toggle="mobile-menu-3" type="button"
                        class="md:hidden text-gary-800 focus:outline-none rounded-lg inline-flex items-center justify-center"
                        aria-controls="mobile-menu-3" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden md:flex justify-between items-end w-full md:w-auto md:order-1" id="mobile-menu-3">
                    <ul
                        class="flex-col md:flex-row flex md:space-x-8 mt-4 md:mt-0 md:text-md md:font-bold md:gap-0 gap-4">
                        <li>
                            <a href="quran_surah"
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Surah
                            </a>
                        </li>
                        <li>
                            <a href="doa"
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Doa-doa
                            </a>
                        </li>
                        <li>
                            <a href="doa_tahlil"
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Doa tahlil
                            </a>
                        </li>
                        <li>
                            <a href="dzikir"
                                class="block py-2 md:bg-transparent text-gray-800 pl-3 pr-4 py-2 md:text-gray-800 md:p-0 rounded underline underline-offset-8 decoration-orange-600 decoration-4">
                                Dzikir setelah sholat
                            </a>
                        </li>
                        <li>
                            <a href="asmaul_husna"
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Asmaul husna
                            </a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <!-- navbar end -->

    <!-- content start -->
    <div id="tahlil">
        <?php foreach ($get_out as $result) { ?>
            <div
                class="tahlilItem px-4 shadow-[8px_8px_11px_#cbced1,_-8px_-8px_11px_#fff] bg-[#ecf0f3] mb-8 py-8 sm:rounded-3xl mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 ">
                <div class=" w-full mb-10">
                    <div class="mb-16 lg:mb-0">
                        <div class='space-x-4 mb-6'>
                            <p class="text-neutral-800  text-lg sm:text-xl font-semibold inline-flex items-center">
                                <?= $result["title"]; ?> (
                                <?= $result["notes"]; ?> )
                            </p>
                        </div>
                        <div class="flex-row justify-end mb-6">
                            <h2 class="arabic text-end text-3xl sm:mt-0 mt-6 text-gray-900 sm:text-4xl mb-4">
                                <?= $result["arabic"]; ?>
                            </h2>
                            <p class="text-black text-end text-md font-semibold md:text-lg">
                                <?= $result["latin"]; ?>
                            </p>
                            <p class="text-black text-start text-base md:text-lg mt-6">
                                Arntinya : "
                                <?= $result["translation"]; ?>"
                            </p>
                            <p class="text-black text-start font-semibold text-base md:text-lg mt-6">
                                <?= $result["source"]; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- content end -->

    <!-- footer start -->
    <footer class="footer-center mt-2 w-full p-4 bg-[#ecf0f3] text-gray-800  shadow-[-9px_-9px_15px_#cbced1]">
        <div class="text-center">
            <p>
                Copyright © 2024 -
                <a class="font-semibold" href="">myquran.com</a>
            </p>
        </div>
    </footer>
    <!-- footer end -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#tahlil .tahlilItem').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>