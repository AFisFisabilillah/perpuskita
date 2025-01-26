<div class="max-w-full overflow-x-hidden">
    <div id="home" class="w-screen h-screen bg-cover" style="background-image: url({{ asset('img/bd1.jpg') }});">
        <div class="absolute inset-0 bg-gradient-to-r h-screen from-black to-transparent ">
            <div class="flex items-center h-full w-full px-8  md:mx-20 justify-center md:justify-normal -mt-12 md:mt-0">
                <div class="max-w-md">
                    <h1 class="text-center md:text-left text-4xl md:text-6xl font-bold text-white md:leading-normal tracking-wide">
                        We Prepare For the <span class="text-primary">Future</span>
                    </h1>
                    <p class="text-white mb-4 text-center md:text-left">
                        Buka cakrawala baru, temukan inspirasi, dan jadilah bagian dari perjalanan pengetahuan di perpustakaan kami
                    </p>
                    <div class="flex flex-col md:flex-row w-full gap-4">
                        <a href="{{ route('buku') }}" type="button" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center w-full md:w-auto">
                            Our Book
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="aboutus" class="bg-bg px-8 pb-10">
        <div class="w-full relative top-10">
            <p class="text-center text-4xl font-bold text-primary underline underline-offset-8">About-us</p>
        </div>
        <div class="grid grid-cols-2 ">
            <div class="md:col-span-1 col-span-2 flex justify-center">
                <img src="{{ asset("img/buku_2.png") }}" alt="" class="md:h-[90%]  h-[70%]">
            </div>
            <div class="md:col-span-1 col-span-2 -mt-56 md:mt-0 px-4">
                <div class="pt-32">
                    <h1 class="md:text-5xl text-4xl font-bold text-primary tracking-wider">25 Years</h1>
                    <h1 class="md:text-4xl text-3xl font-bold text-white">Of Experience</h1>
                </div>
                <p class="text-white mt-4 text-justify text-sm md:text-base font-light ">"PerpusKita adalah platform perpustakaan digital yang dirancang untuk memudahkan akses buku dan literatur bagi semua orang. Dengan visi menciptakan masyarakat yang cinta membaca, kami menyediakan berbagai koleksi buku, mulai dari fiksi hingga referensi akademik. PerpusKita hadir untuk mendukung pendidikan, pengetahuan, dan kreativitas tanpa batas. Bersama PerpusKita, mari jadikan membaca bagian dari gaya hidup!</p>
                <p class="text-white mt-4 text-sm md:text-base font-light">Perpuskita adalah website perpustakaan digital yang menyediakan berbagai koleksi buku untuk semua kalangan. Dengan kemudahan akses dan fitur praktis, kami hadir untuk mendukung minat baca dan pembelajaran Anda kapan saja, di mana saja.</p>
            </div>
        </div>
    </div>
    <div id="book" class=" w-full h-screen bg-primary py-14 ">
        <div class="w-full text-center">
            <h1 class="text-4xl font-bold text-bg underline underline-offset-8">Our Book</h1>
            <p class="mt-6 md:text-base text-sm font-light text-white text-wrap">Kami memiliki banyak buku di perpustakaan kami, <br> mulai dari novel, buku sejarah, hingga buku anak-anak. Di sini,<br> koleksi bukunya sangat lengkap, dan pelayanan juga sangat baik.
            </p>
        </div>
        <div class="px-16 mt-14 grid grid-cols-3 justify-center h-screen">
            <!-- Card 1 -->



            <a href="{{ route('buku') }}">
                <div class="col-span-3 md:col-span-1  max-w-xs border rounded-lg shadow bg-gray-800 border-gray-700 h-96 bg-containt bg-no-repeat bg-center group  transtion duration-300 " style="background-image: url({{ asset('img/laskar_pelangi.jpg') }});">

                </div>
            </a>
            <a href="{{ route('buku') }}">
                <div class="col-span-3 md:col-span-1  max-w-xs border rounded-lg shadow bg-gray-800 border-gray-700 h-96 bg-containt bg-no-repeat bg-center group  transtion duration-300 " style="background-image: url({{ asset('img/bumi.jpg') }});">

                </div>
            </a>
            <a href="{{ route('buku') }}">
                <div class="col-span-3 md:col-span-1  max-w-xs border rounded-lg shadow bg-gray-800 border-gray-700 h-96 bg-containt bg-no-repeat bg-center group  transtion duration-300 " style="background-image: url({{ asset('img/sang_pemimpi.jpg') }});">

                </div>
            </a>
        </div>
    </div>
    <div id="member" class="pt-16 pb-4 bg-bg">
        <div class="w-full text-center">
            <h1 class="text-4xl font-bold text-primary underline underline-offset-8">Our Team</h1>
            <p class="mt-6 md:text-base text-sm font-light text-white text-wrap">Ini adalah team dari perpuskita, Teamnya terdiri dari 4 Orang yaitu <br> Fajar(Ketua), Afis, melain, Yonachi</p>
        </div>
        <div class="flex justify-center gap-8 mt-12">
            <!-- PROFILE 1 -->
            <img data-popover-target="popover-user-fajar" class="w-14 h-14 rounded-full" src="{{ asset("img/fajar.jpg") }}" alt="Rounded avatar">
            <div data-popover id="popover-user-fajar" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm transition-opacity duration-300  border  rounded-lg shadow-sm opacity-0 text-gray-400 bg-gray-800 border-gray-600">
                <div class="p-3">
                    <div class="flex items-center justify-between mb-2">
                        <a href="#">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img/pp_fajar.jpg') }}" alt="Jese Leos">
                        </a>
                        <div>
                            <button type="button" class="text-white   focus:ring-4  font-medium rounded-lg text-xs px-3 py-1.5 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800"><a href="https://www.instagram.com/f.muustofaa/">Follow</a></button>
                        </div>
                    </div>
                    <p class="text-base font-semibold leading-none text-white">
                        <a href="#">fajar mustofa</a>
                    </p>
                    <p class="mb-3 text-sm font-normal">
                        <a href="#" class="hover:underline">@f.muustofaa</a>
                    </p>
                    <p class="mb-4 text-sm">CEO Perpuskita<a href="#" class="text-blue-500 hover:underline block">perpuskita.com</a></p>
                    <ul class="flex text-sm">
                        <li class="me-2">
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">661</span>
                                <span>Following</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">115</span>
                                <span>Followers</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div data-popper-arrow></div>
            </div>


            <img data-popover-target="popover-user-yonachi" class="w-14 h-14 rounded-full" src="{{ asset("img/yona.jpg") }}" alt="Rounded avatar">
            <div data-popover id="popover-user-yonachi" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm transition-opacity duration-300  border  rounded-lg shadow-sm opacity-0 text-gray-400 bg-gray-800 border-gray-600">
                <div class="p-3">
                    <div class="flex items-center justify-between mb-2">
                        <a href="#">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img/pp_yona.jpg') }}" alt="Jese Leos">
                        </a>
                        <div>
                            <button type="button" class="text-white   focus:ring-4  font-medium rounded-lg text-xs px-3 py-1.5 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800"><a href="https://www.instagram.com/ync.sya_/">Follow</a></button>
                        </div>
                    </div>
                    <p class="text-base font-semibold leading-none text-white">
                        <a href="#">Yonachi Sayuri Anzalna</a>
                    </p>
                    <p class="mb-3 text-sm font-normal">
                        <a href="#" class="hover:underline">@ync.sya_</a>
                    </p>
                    <p class="mb-4 text-sm">Team erpuskita<a href="#" class="text-blue-500 hover:underline block">perpuskita.com</a></p>
                    <ul class="flex text-sm">
                        <li class="me-2">
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">311</span>
                                <span>Following</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">318</span>
                                <span>Followers</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div data-popper-arrow></div>
            </div>
            <!-- profile 3 -->
            <img data-popover-target="popover-user-melani" class="w-14 h-14 rounded-full" src="{{ asset("img/melani.jpg") }}" alt="Rounded avatar">
            <div data-popover id="popover-user-melani" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm transition-opacity duration-300  border  rounded-lg shadow-sm opacity-0 text-gray-400 bg-gray-800 border-gray-600">
                <div class="p-3">
                    <div class="flex items-center justify-between mb-2">
                        <a href="#">
                            <img class="w-10 h-10 rounded-full" src="{{ asset('img/pp_melani.jpg') }}" alt="Jese Leos">
                        </a>
                        <div>
                            <button type="button" class="text-white   focus:ring-4  font-medium rounded-lg text-xs px-3 py-1.5 bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-blue-800"><a href="https://www.instagram.com/mlyniii_/">Follow</a></button>
                        </div>
                    </div>
                    <p class="text-base font-semibold leading-none text-white">
                        <a href="#">Melani Aprilia Putri</a>
                    </p>
                    <p class="mb-3 text-sm font-normal">
                        <a href="#" class="hover:underline">@mlyniii_</a>
                    </p>
                    <p class="mb-4 text-sm">Team erpuskita<a href="#" class="text-blue-500 hover:underline block">perpuskita.com</a></p>
                    <ul class="flex text-sm">
                        <li class="me-2">
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">209</span>
                                <span>Following</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="hover:underline">
                                <span class="font-semibold text-white">675</span>
                                <span>Followers</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div data-popper-arrow></div>
            </div>
            <!-- End Profile -->
        </div>
    </div>
    <div id="quote" class="bg-bg relative bg-bottom" style="background-image: url({{ asset('img/bg3.jpg') }});">
        <div class="relative  w-full h-full py-8 bg-gradient-to-b from-bg via-black/40 to-transparent">
            <div class="py-20">
                <h1 class="py-24 text-5xl font-bold italic text-white px-4 text-center">"Pelopor Inspirasi dan Pengetahuan Anda."</h1>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div class="bg-bg py-8 pl-14 pr-16">
        <div class="flex justify-between mb-6">
            <h1 class="text-xl text-white font-extrabold">Pepuskita</h1>
            @if (session()->has('token'))
            <a href="{{ route('buku') }}" class="text-primary text-xl font-extrabold">Reservasi -></a>
            @else
            <div class="text-primary text-xl font-extrabold">
                Login ->
            </div>
            @endif
        </div>
        <div class="grid grid-cols-12 gap-10">
            <div class="col-span-6 md:col-span-5">
                <h1 class="text-lg mb-4 text-white font-bold">About Us</h1>
                <p class="text-md text-white font-light ">Ini adalh website perpuskita di mana kamu bisa mencari buku dan me reservasinya jik akmau ingin meresrvasi kamu harus login terlebih dahul sebelum Reservasi</p>
            </div>
            <div class="col-span-6 md:col-span-3">
                <h1 class="text-lg mb-4 text-white font-bold">Office</h1>
                <p class="text-md text-white font-light ">Kantor kamu=i berada di Bantargebang, cikiwul, jln Rawa Butun, lap Rawa Butun </p>
            </div>
            <div class="col-span-6 md:col-span-3">
                <h1 class="text-lg mb-4 text-white font-bold">Contac Us</h1>
                <p class="text-md text-white font-light ">Email : afisfisabilillah@gmail.com</p>
                <p class="text-md text-white font-light ">Telp : (+62) 856-9545-2612</p>
            </div>
            <div class="col-span-6 md:col-span-1">
                <h1 class="text-lg mb-4 text-white font-bold">Link </h1>
                <a href="#home" class="text-md text-white font-light ">Home</a>
                <a href="#aboutus" class="text-md text-white font-light ">About us</a>
                <a href="#book" class="text-md text-white font-light ">Book</a>
                <a href="#member" class="text-md text-white font-light ">Our Team </a>
                <a href="#quote" class="text-md text-white font-light ">Quote</a>
            </div>

        </div>
    </div>
</div>