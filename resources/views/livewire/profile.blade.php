
<div class="bg-gradient-to-tr from-gray-800 to-black py-24 px-8 md:px-16 lg:px-36 min-h-screen ">
    @if ($toggle)
    <div id="alert-border-3" class="flex top-0 items-center px-4 py-8 mb-4 border-t-4 text-green-400 bg-gray-800 border-green-600  right-0 left-0 z-[99999] fixed" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            Berhasil menghapus reservasi
        </div>
        <button wire:click="closeNotif" type="button" class="ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2 focus:ring-green-400 p-1.5  inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>
    @endif


    <div class="flex w-full mt-8 justify-center flex-wrap gap-3 lg:justify-normal">
        <div class="">
            <img class="size-40 lg:size-60 rounded-full shadow-card-green" src="{{ asset('storage/profile/'.$pathImage) }} " alt="">
        </div>
        <div class="mx-14 mt-4 relative">
            <p class="text-2xl lg:text-4xl text-center md:text-left text-white/90 font-bold">{{ $nama }}</p>
            <p class="lg:text-xl text-lg md:text-left text-white/90 lg:font-semibold font-medium text-center lg:text-left lg:mt-4">{{ $email }}</p>

            <div data-modal-target="uploadModal" data-modal-toggle="uploadModal" class="lg:absolute lg:bottom-6 md:ml-0 ml-6 mt-4">
                <button wire:click="activeToggleUpload" class="px-4 py-2 lg:px-5 lg:py-2.5 bg-primary text-white  rounded-lg  text-sm lg:text-md font-normal lg:font-medium">Add photo</button>
            </div>
        </div>
    </div>





    @if ($uploadToggle)
    <!-- Main modal -->
    <div id="" tabindex="-1" aria-hidden="true" class=" flex overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h3 class="text-lg font-semibold text-white">
                        Add photo profile
                    </h3>
                    <button wire:click="closeToggleUpload" type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="uploadModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit="uploadPhoto" method="post" class="p-4 md:p-5">
                    <div class="my-6">
                        <input class="block w-full text-lg  border  rounded-lg cursor-pointer text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" id="large_size" type="file" wire:model="image">
                    </div>

                    @error('image')
                    <p>{{ $message }}</p>
                    @enderror

                    <button type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add photo
                    </button>
                </form>
            </div>
        </div>
    </div>

    @endif




    <div class="mt-6">
        <div class="mb-4 border-b border-gray-700">
            <ul class="flex flex-wrap justify-around -mb-px text-sm font-medium text-center" id="default-styled-tab" data-tabs-toggle="#default-styled-tab-content" data-tabs-active-classes="text-primary hover:text-primary dark:text-primary hover:text-primary border-primary border-primary" data-tabs-inactive-classes="border-transparent text-white/80 hover:text-gray-600 hover:border-gray-700 dark:hover:text-gray-300" role="tablist">
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg text-md" id="profile-styled-tab" data-tabs-target="#styled-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Reservasi</button>
                </li>
                <li class="me-2" role="presentation">
                    <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300 text-md" id="dashboard-styled-tab" data-tabs-target="#styled-dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">History</button>
                </li>

            </ul>
        </div>
        <div id="default-styled-tab-content">
            <div class="md:p-4 p-2  rounded-lg bg-gray-800 grid md:gap-4 gap-2 grid-cols-12" id="styled-profile" role="tabpanel" aria-labelledby="profile-tab">
                @foreach ($reservasi as $reserv)
                @if ($reserv['status'] == 'pending')
                <div wire:key="{{ $reserv['id'] }}" class=" col-span-6 md:col-span-4 lg:col-span-3 flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-pending border border-yellow-200 relative">
                    <div class="absolute top-4 right-4 z-40">
                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $reserv['id']}}" class="inline-flex items-center p-2 text-sm font-bold text-center  bg-white/30 backdrop-blur-lg rounded-lg  focus:ring-4 focus:outline-none text-slate-500 hover:bg-gray-700 focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDots{{ $reserv['id'] }}" class="z-10 hidden divide-y rounded-lg shadow w-36 lg:w-44 bg-gray-700 divide-gray-600 right-14">
                            <ul class="py-2 text-sm  text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <a wire:navigate href="{{ route('detailukuBuku',$reserv['id'] ) }}" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Detail Buku</a>
                                </li>
                            </ul>
                            <div class="py-2">
                                <button type="button" wire:click="deleteReservasi({{ $reserv['id'] }})" class="w-full block px-4 py-2 text-sm hover:bg-gray-600 text-red-600 hover:text-red-800">Delete</button>
                            </div>
                        </div>
                    </div>
                    <a href="">
                        <img class="rounded-lg object-cover lg:h-64 md:h-44 h-40 w-full" src="{{ asset('storage/buku/'.$reserv['image']) }}" alt="" />
                    </a>
                    <div class=" px-2 md:px-2 py-1">
                        <a href="">
                            <h5 class="mb-1 md:text-lg text-md font-bold tracking-tight text-white">{{ $reserv['judul_buku'] }}<span class="bg-yellow-100 text-yellow-800 text-xs font-medium mx-2 px-1 md:px-2 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $reserv['status'] }}</span></h5>
                        </a>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">id Reservasi : {{ $reserv['id'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-ambil : {{ $reserv['waktu_ambil'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-kemabli : {{ $reserv['waktu_kembali'] }}</p>
                    </div>
                </div>
                @elseif($reserv['status'] == 'dipinjam')
                <div wire:key="{{ $reserv['id'] }}" class=" col-span-6 md:col-span-4 lg:col-span-3 flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-delete border border-red-400 relative">
                    <div class="absolute top-4 right-4 z-40">
                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $reserv['id']}}" class="inline-flex items-center p-2 text-sm font-bold text-center  bg-white/30 backdrop-blur-lg rounded-lg  focus:ring-4 focus:outline-none text-slate-500 hover:bg-gray-700 focus:ring-gray-600" type="button">
                            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="dropdownDots{{ $reserv['id'] }}" class="z-10 hidden divide-y rounded-lg shadow w-36 lg:w-44 bg-gray-700 divide-gray-600 right-14">
                            <ul class="py-2 text-sm  text-gray-200" aria-labelledby="dropdownMenuIconButton">
                                <li>
                                    <a wire:navigate href="{{ route('detailukuBuku',$reserv['id'] ) }}" class="block px-4 py-2 hover:bg-gray-600 hover:text-white">Detail Buku</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <a href="">
                        <img class="rounded-lg object-cover lg:h-64 md:h-44 h-40 w-full" src="{{ asset('img/bd1.jpg') }}" alt="" />
                    </a>
                    <div class=" px-2 md:px-2 py-1">
                        <a href="">
                            <h5 class="mb-1 md:text-lg text-md font-bold tracking-tight text-white">{{ $reserv['judul_buku'] }}<span class="bg-red-300 text-red-800 text-xs font-medium mx-2 px-1 md:px-2 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $reserv['status'] }}</span></h5>
                        </a>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">id Reservasi : {{ $reserv['id'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-ambil : {{ $reserv['waktu_ambil'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-kemabli : {{ $reserv['waktu_kembali'] }}</p>
                    </div>
                </div>
                @endif

                @endforeach
            </div>
            <div class=" p-4 rounded-lg  bg-gray-800 grid md:gap-4 gap-2 grid-cols-12" id="styled-dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                @foreach ($this->showHistory() as $history)
                <div wire:key="{{ $history['id'] }}" class=" col-span-6 md:col-span-4 lg:col-span-3 flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-pending border border-yellow-200 relative">
                    <a href="">
                        <img class="rounded-lg object-cover lg:h-64 md:h-44 h-40 w-full" src="{{ asset('storage/buku/'.$history['buku']['image']) }}" alt="" />
                    </a>
                    <div class=" px-2 md:px-2 py-1">
                        <a href="">
                            <h5 class="mb-1 md:text-lg text-md font-bold tracking-tight text-white">{{ $history['buku']['judul'] }}</h5>
                        </a>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">user : {{ $history['user']['name'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-ambil : {{ $history['waktu_pinjam'] }}</p>
                        <p class="mb-1 font-normal text-xs md:text-md text-gray-400">tgl-kemabli : {{ $history['waktu_kembali'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>

</div>