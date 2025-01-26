<div>

    @if ($toggleNotif)

    <div id="alert-border-3" class="flex top-0 items-center px-4 py-6 mb-4  border-t-4  text-green-400 bg-gray-950 border-green-600 fixed right-0 left-0 z-[99999]" role="alert">
        <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <div class="ms-3 text-sm font-medium">
            {{ $message }}
        </div>
        <button wire:click="closeNotification" type="button" class="ms-auto -mx-1.5 -my-1.5   rounded-lg focus:ring-2 focus:ring-green-400 p-1.5  inline-flex items-center justify-center h-8 w-8 bg-gray-800 text-green-400 hover:bg-gray-700" data-dismiss-target="#alert-border-3" aria-label="Close">
            <span class="sr-only">Dismiss</span>
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
        </button>
    </div>

    @endif

    <section class="">
        <div class="mb-10">
            <h1 class="font-bold text-3xl ">Reservasi User </h1>
        </div>
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-6">
            <div class="relative overflow-hidden  shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">All Reservasi:</span>
                            <span class="dark:text-white">{{ $totalReservasi }}</span>
                        </h5>

                    </div>

                    <div class="">
                        <form class="flex items-center max-w-sm mx-auto">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                                </div>
                                <input wire:keyup.debounce="search" wire:model.live="q" type="text" id="simple-search" class=" border   text-sm rounded-lg   block w-full ps-5 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search id reservasi" required />
                            </div>
                            <button class="p-2.5 ms-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </form>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left  text-gray-400">
                        <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">id-reservasi</th>
                                <th scope="col" class="px-4 py-3">waktu Ambil</th>
                                <th scope="col" class="px-4 py-3">waktu Kembali</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">user</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 0;
                            @endphp

                            @foreach ($reservasi as $reser )


                            <tr wire:key="{{ $reser['id'] }}" class="border-b border-gray-600  hover:bg-gray-700">

                                <th scope="row" class="flex items-center px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png" alt="iMac Front Image" class="w-auto h-8 mr-3">
                                    {{ $reser['buku']["judul"] }}
                                </th>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">


                                        {{ $reser['id'] }}
                                    </div>
                                </td>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">


                                        {{ $reser['waktu_ambil'] }}
                                    </div>

                                </td>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">


                                        {{ $reser['waktu_kembali'] }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">

                                    @if ($reser['status'] == "pending")
                                    <span class="bg-yellow-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-yellow-400 dark:text-primary">{{ $reser['status'] }}</span>
                                    @else
                                    <span class="bg-red-600 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-red-600 dark:text-primary">{{ $reser['status'] }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                        </svg>

                                        {{ $reser['user']['name'] }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3">
                                        @if ($reser['status']=="pending")
                                        <button wire:click="activeModal({{$counter}})" class="block px-4 py-2 text-xs bg-amber-500 text-white rounded-md ">Ubah Status </button>

                                        @elseif ($reser['status']=="dipinjam")
                                        <button wire:click="activeModal({{$counter}})" class="block px-3 py-1.5 text-xs bg-cyan-600 text-white rounded-md">Ubah status </button>

                                        @endif
                                    </div>
                                </td>


                            </tr>
                            @php
                            $counter++
                            @endphp
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>
    </section>
    @if ($modalActive )
    <livewire:modal.reservation-modal :judul="$data['judul']" :user="$data['user']" :waktuAmbil="$data['waktu_ambil']" :status="$data['status']" :id="$data['id']" />
    @endif
</div>