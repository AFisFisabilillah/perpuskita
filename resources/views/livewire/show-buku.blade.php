<div class=" py-12 bg-gradient-to-tr from-gray-800 to-black h-full ">
    @if (session()->has('reservation_succes'))
    @if ($toggleNotif)

    @error('waktu')
    <div id="alert-border-3" class="flex top-0 items-center p-4 mb-4  border-t-4 text-red-400 border-red-600 bg-gray-800  absolute right-0 left-0 z-[99999]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{ $message }}
        </div>
        <button wire:click="toggleNotifDisable" type="button" class="ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2 focus:ring-green-400 p-1.5  inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @else

    <div id="alert-border-3" class="flex top-0 items-center p-4 mb-4  border-t-4 text-green-400 border-green-600 bg-gray-800  absolute right-0 left-0 z-[99999]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            Berhasil membuat reservasi
        </div>
        <button wire:click="toggleNotifDisable" type="button" class="ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2 focus:ring-green-400 p-1.5  inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    
    @enderror



    @endif


    @endif
    <section class="py-8  md:py-16  antialiased">
        <div class="max-w-screen-xl px-6 mx-auto 2xl:px-0">
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 xl:gap-16">
                <div class="shrink-0 max-w-md lg:max-w-lg mx-auto mt-4 ">
                    <img class="max-h-96 w-full @if ($buku['status'] == 'tersedia')
                        shadow-card-green
                        @elseif ($buku['status'] == 'reservasi')
                        shadow-card-yellow
                        @else
                        shadow-card-red
                    @endif block" src="{{ asset('storage/buku/'.$buku['image']) }}" alt="" />
                </div>

                <div class="mt-6 sm:mt-8 lg:mt-0">
                    <h1
                        class="text-2xl font-extrabold sm:text-3xl text-white">
                        {{ $buku['judul'] }}
                    </h1>
                    <h2 class="text-lg font-semibold text-white/90 mb-2">{{ $buku['tahun_terbit'] }}</h2>
                    @if ($buku['status'] == 'tersedia')
                    <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $buku['status'] }}</span>
                    @elseif ($buku['status'] == 'reservasi')
                    <span class="bg-yellow-200 text-yellow-600 text-xs font-medium me-2 px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $buku['status'] }}</span>
                    @else
                    <span class="bg-red-300 text-red-600 text-xs font-medium me-2  px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $buku['status'] }} </span>
                    @endif

                    <div class="mt-4 sm:items-center sm:gap-4 sm:flex">
                        <p
                            class="text-lg font-semibold  sm:text-xl text-white">
                            -{{ $buku['penulis'] }}
                        </p>


                    </div>

                    <div class="mt-6 sm:gap-4 sm:items-center sm:flex sm:mt-8">
                    
                        @if ($buku['status'] == 'tersedia')

                        <button
                            wire:click="toggleActive"
                            href="#"
                            title=""
                            class="text-white mt-4 sm:mt-0 bg-primary hover:bg-primary focus:ring-4 focus:ring-primary font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary dark:hover:bg-primary focus:outline-none dark:focus:ring-primary flex items-center justify-center"
                            role="button">
                            <svg
                                class="w-5 h-5 -ms-2 me-2"
                                aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg"
                                width="24"
                                height="24"
                                fill="none"
                                viewBox="0 0 24 24">
                                <path
                                    stroke="currentColor"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
                            </svg>

                            Reservasi
                        </button>

                        @endif


                    </div>

                    <hr class="my-6 md:my-8 border-gray-200 dark:border-gray-800" />

                    <p class="mb-2 text-gray-200 text-md dark:text-gray-400 font-bold">Penerbit : <span class=" text-gray-500 font-normal"> {{ $buku['penerbit'] }} </span> </p>
                    <p class="mb-2 text-gray-200 text-md dark:text-gray-400 font-bold">Tahun terbit : <span class=" text-gray-500 font-normal"> {{ $buku['tahun_terbit'] }}</span></p>

                    <p class="mb-6 text-gray-400 dark:text-gray-400">
                        {{ $buku['sinopsis'] }}
                    </p>


                </div>
            </div>
        </div>
    </section>

    @if ($toggle)
    <div tabindex="-1" aria-hidden="true" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full z-[9999]">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h3 class="text-lg font-semibold  text-white">
                        Create New Reservation
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent  rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="reservasi" wire:click="toggleDisable">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit="reservation" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-white">Judul Buku</label>
                            <input type="text" name="name" id="name" class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-800  placeholder-gray-400 text-white ring-primary border-primary" placeholder="Type product name" required disabled value="{{ $buku['judul'] }}">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="price" class="block mb-2 text-sm font-medium  text-white">Waktu Ambil</label>
                            <input type="date" name="price" id="price" class="border   text-sm rounded-lg    block w-full p-2.5 bg-gray-600 border-gray-500  placeholder-gray-400 text-white focus:ring-primary focus:border-primary" wire:model.live="waktuReservasi" placeholder="$2999" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="category" class="block mb-2 text-sm font-medium text-white">Waktu pengembalian</label>
                            <input type="date" name="price" id="price" class="border   text-sm rounded-lg   f block w-full p-2.5 bg-gray-800 border-gray-500    placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="$2999" required disabled wire:model="waktuKembali" value="">
                        </div>


                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add new reservasi
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
    <!-- Modal -->

</div>