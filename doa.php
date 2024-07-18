<?php
// URL endpoint API yang ingin Anda akses
$url = 'https://doa-doa-api-ahmadramadhan.fly.dev/api';

// Inisialisasi cURL
$ch = curl_init();

// Set URL yang akan dituju
curl_setopt($ch, CURLOPT_URL, $url);

// Set opsi untuk mengembalikan respons sebagai string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Eksekusi permintaan GET
$response = curl_exec($ch);

// Cek jika ada kesalahan
if (curl_errno($ch)) {
    // echo 'Error: ' . curl_error($ch);
    header("Location: error500");

}

// Tutup sesi cURL
curl_close($ch);

// Menampilkan respons dari API
$data = json_decode($response, true);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="baca quran">
    <meta name="description" content="baca quran tanpa iklan">
    <meta name="author" content="myquran">
    <title>My Qur'an</title>
    <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="font.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
        font-weight: 500;
        font-style: normal;
    }
</style>

<body class="bg-[#ecf0f3]">
    <!-- navbar start -->
    <nav class="mb-0 bg-[#ecf0f3] py-5 shadow-xl sticky top-0 z-10 mb-2">
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
                                    placeholder="Cari doa" required>
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
                                class="block py-2 md:bg-transparent text-gray-800 pl-3 pr-4 py-2 md:text-gray-800 md:p-0 rounded underline underline-offset-8 decoration-orange-600 decoration-4">
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
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Dzikir setelah sholat
                            </a>
                        </li>
                        <li>
                            <a href="asmaul_husna"
                                class="block py-2 text-gray-800 md:hover:bg-transparent md:border-0 pl-3 pr-4 py-2 md:p-0 hover:underline underline-offset-8 decoration-orange-600 decoration-4">
                                Asmaul husna
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <script src="https://unpkg.com/@themesberg/flowbite@1.1.1/dist/flowbite.bundle.js"></script>
    <!-- navbar end -->

    <!-- content start -->
    <section class="text-gray-600 body-font flex justify-center items-center">
        <div class="container px-5 py-4 mx-auto">
            <div class="flex flex-wrap -m-4 text-center" id="doaList">

                <?php foreach ($data as $doa) { ?>
                    <div class="doaItem p-4 sm:w-1/2 lg:w-1/3 w-full hover:scale-105 duration-500">
                        <div
                            class="flex-col items-center  justify-between p-4  rounded-lg shadow-[8px_8px_11px_#cbced1,_-8px_-8px_11px_#fff] bg-[#ecf0f3] hover:shadow-[inset_9px_9px_15px_#cbced1,inset_-9px_-9px_15px_#fff] hover:border-2 hover:border-[#ecf0f3]">
                            <div>
                                <h2 class="text-gray-900 text-lg font-bold text-start">
                                    <?php echo $doa['id']; ?>.
                                </h2>
                                <div class="flex justify-end">
                                    <h2 class="text-gray-900 text-xl font-bold text-end doa">
                                        <?php echo $doa['doa']; ?>
                                    </h2>
                                </div>
                                <div class="pt-4 flex justify-start">
                                    <button
                                        class="viewButton text-sm text-center px-4 py-2 bg-orange-600 text-white rounded-lg tracking-wider hover:bg-orange-400 outline-none">
                                        Lihat
                                    </button>
                                    <span class="ayat hidden">
                                        <?php echo $doa['ayat']; ?>
                                    </span>
                                    <span class="latin hidden">
                                        <?php echo $doa['latin']; ?>
                                    </span>
                                    <span class="artinya hidden">
                                        <?php echo $doa['artinya']; ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>
    </section>
    <!-- content end -->

    <!-- Modal -->
    <div id="myModal" class="fixed inset-0 overflow-y-auto hidden z-20">
        <div class="flex items-center justify-center h-full">
            <div class="fixed inset-0 bg-black opacity-70"></div>
            <div class="relative h-screen w-full">
                <div class="overflow-y-auto max-h-full mx-auto px-0">
                    <div class="2xl:mx-auto 2xl:container mx-4 py-16 flex justify-center">
                        <div class="w-full relative flex items-center justify-center">
                            <img src="https://img.freepik.com/premium-photo/mosque-building-animation-plain-white-black-background-no-shadow-no-other-image_981650-1197.jpg"
                                alt="dining" class="w-full h-full absolute z-0 hidden xl:block" />
                            <img src="https://img.freepik.com/premium-photo/mosque-building-animation-plain-white-black-background-no-shadow-no-other-image_981650-1197.jpg"
                                alt="dining" class="w-full h-full absolute z-0 hidden sm:block xl:hidden" />
                            <img src="https://2.bp.blogspot.com/-DQFFP7qUeCw/US9X1eggF9I/AAAAAAAAAb4/CJxZbpq08Sk/s1600/islamic-wallpaper-free-download-Allah.jpg"
                                alt="dining" class="w-full h-full absolute z-0 sm:hidden" />
                            <div
                                class="bg-[#171717] bg-opacity-50 md:my-16 lg:py-16 py-10 w-full md:mx-24 md:px-12 px-4 flex flex-col items-center justify-center relative z-40">
                                <div class="absolute inline-block top-0 right-0 mb-4">
                                    <button id="modalCloseButton"
                                        class="bg-red-600 py-1 px-3 text-lg sm:text-xl text-white font-bold font-mono">X</button>
                                </div>
                                <h1
                                    class="text-2xl sm:text-4xl font-semibold leading-9 text-white underline underline-offset-8">
                                    <span id="modalTitle"></span>
                                </h1>
                                <p class="text-3xl arabic leading-loose tracking-wide text-center text-white mt-8">
                                    <span id="modalAyat"></span>
                                </p>
                                <p class="text-xl  text-center text-white mt-4">
                                    <span id="modalLatin"></span>
                                </p>
                                <p class="text-lg sm:text-xl arabic leading-normal text-center text-white mt-8">
                                    Artinya : <span id="modalArti"></span>

                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#doaList .doaItem').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Menambahkan event click pada tombol "Lihat"
            $('#doaList').on('click', '.viewButton', function () {
                // Mendapatkan teks dari nama doa, ayat, dan artinya
                var namaDoa = $(this).closest('.doaItem').find('.doa').text();
                var ayat = $(this).closest('.doaItem').find('.ayat').text();
                var latin = $(this).closest('.doaItem').find('.latin').text();
                var arti = $(this).closest('.doaItem').find('.artinya').text();

                // Menetapkan nilai konten dinamis ke dalam elemen HTML modal
                $('#modalTitle').text(namaDoa);
                $('#modalAyat').text(ayat);
                $('#modalLatin').text(latin);
                $('#modalArti').text(arti);
                $('#myModal').show();
            });

            // Menambahkan event click pada tombol "Close" pada modal
            $('#modalCloseButton').on('click', function () {
                $('#myModal').hide();
            });
        });
    </script>

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

    <!-- Search fiture -->
    <script>
        $(document).ready(function () {
            $('#searchInput').on('keyup', function () {
                var value = $(this).val().toLowerCase();
                $('#doaList .doaItem').filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>

</html>