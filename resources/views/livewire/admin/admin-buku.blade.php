<div>
    @if ($toggleNotif)

    <div id="alert-border-3" class="flex top-0 items-center px-4 py-6 mb-4  border-t-4  text-green-400 bg-gray-800 border-green-600 fixed right-0 left-0 z-[99999]" role="alert">
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

    @endif

    <section class="">
        <div class="mb-10">
            <h1 class="font-bold text-3xl ">Buku</h1>
        </div>
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-6">
            <div class="relative overflow-hidden  shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">All Products:</span>
                            <span class="dark:text-white">{{ count($buku) }}</span>
                        </h5>
                        <h5>
                            <span class="text-gray-500">Total sales:</span>
                            <span class="dark:text-white">$88.4k</span>
                        </h5>
                    </div>
                    <div class="flex flex-col flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <button wire:click="toggleActive" data-modal-target="" data-modal-toggle="" type="button" class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-primary hover:bg-primary focus:ring-4 focus:ring-primary dark:bg-primary dark:hover:bg-primary focus:outline-none dark:focus:ring-primary">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add new product
                        </button>

                        <form class="flex items-center max-w-sm mx-auto">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">

                                </div>
                                <input wire:keyup.debounce="serachBuku" wire:model.live="q" type="text" id="simple-search" class=" border   text-sm rounded-lg   block w-full ps-10 p-2.5  bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search branch name..." required />
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
                    <table class="w-full text-sm text-left  text-gray-400 min-h-screen">
                        <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">Status</th>
                                <th scope="col" class="px-4 py-3">ID-Buku</th>
                                <th scope="col" class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $counter = 0;
                            @endphp

                            @foreach ($buku as $bk )

                            <tr wire:key="{{ $bk['id'] }}" class="border-b border-gray-600  hover:bg-gray-700">

                                <th scope="row" class="flex items-center px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <img src="{{ asset("storage/buku/".$bk["image"]) }}" alt="iMac Front Image" class="w-auto h-8 mr-3">
                                    {{ $bk['judul'] }}
                                </th>
                                <td class="px-4 py-2">
                                    @if ($bk['status'] == "tersedia")
                                    <span class="bg-green-500 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-green-500 dark:text-primary">{{ $bk['status'] }}</span>
                                    @elseif ($bk['status'] == "reservasi")
                                    <span class="bg-yellow-400 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-yellow-400 dark:text-primary">{{ $bk['status'] }}</span>
                                    @else
                                    <span class="bg-red-600 text-white text-xs font-medium px-2 py-0.5 rounded dark:bg-red-600 dark:text-primary">{{ $bk['status'] }}</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">

                                        {{ $bk['id'] }}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex gap-3">
                                        <button wire:click="updateButton({{$counter}})" class="block px-3 py-1.5 text-xs bg-amber-500 text-white rounded-md ">edit </button>
                                        <button class="block px-3 py-1.5 text-xs bg-cyan-600 text-white rounded-md "><a href="{{ route('detailBuku', $bk['id']) }}">detail</a></button>
                                        @if ($bk['status'] != 'pinjam' && $bk['status'] != 'reservasi')
                                        <button wire:confirm="Apakah anda ingin menghapus buku  ?" wire:click="deleteBuku({{ $bk['id']}})" class="block px-3 py-1.5 text-xs bg-red-600 text-white rounded-md ">delete</button>
                                        @endif
                                      
                                    </div>
                                </td>
                            </tr>
                            @php
                            $counter++
                            @endphp
                            @endforeach
                        </tbody>
                        <!-- Animasi Loading -->
                        <div  wire:loading wire:target="serachBuku" class="flex items-center justify-center w-56 h-56 border border-gray-200 rounded-lg bg-white/10  dark:bg-gray-800 dark:border-gray-700 backdrop-blur-lg absolute top-44 right-1/2 translate-x-[7rem]">
                            <div role="status" class="flex justify-center items-center w-full h-full">
                                <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg ">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </div>

                    </table>
                </div>

            </div>
        </div>
    </section>


    @if ($toggle)
    <!-- Main modal -->
    <div id="" tabindex="-1" aria-hidden="true" class="flex  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h3 class="text-lg font-semibold text-white">
                        Create New Product
                    </h3>
                    <button wire:click="toggleClose" type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-toggle="addBuku">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit="addBuku" class="p-4 md:p-5">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="judul" class="block mb-2 text-sm font-medium  text-white">Judul</label>
                            <input wire:model="judul" type="text" name="judul" id="judul" class=" border   text-sm rounded-lg focus:ring-primary  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white dark:focus:ring-primary focus:border-primary" placeholder="wqewqewq Type product name" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penulis" class="block mb-2 text-sm font-medium text-white">penulis</label>
                            <input wire:model="penulis" type="text" name="penulis" id="penulis" class=" border   text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="penulis" required>
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penerbit" class="block mb-2 text-sm font-medium text-white">penerbit</label>
                            <input wire:model="penerbit" type="text" name="penerbit" id="penerbit" class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="penerbit" required>
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label for="tgl" class="block mb-2 text-sm font-medium text-white">Tgl Terbit</label>
                            <input wire:model="tgl" type="date" name="tgl" id="tgl" class=" border   text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="$2999" required>
                            @error('waktu')
                                <p class="text-xs text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="col-span-2 sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-white" for="file_input">Upload foto buku </label>
                            <input wire:model="image" class="block w-full text-sm  border rounded-lg cursor-pointer  text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm  text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
                        </div>

                        <div class="col-span-2">
                            <label for="sinopsis" class="block mb-2 text-sm font-medium text-white"> Sinopsis</label>
                            <textarea wire:model="sinopsis" id="sinopsis" rows="4" class="block p-2.5 w-full text-sm  rounded-lg border   focus:border-blue-500 bg-gray-600 border-gray-500 dark:placeholder-gray-400 text-white focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write sinopsis here" required></textarea>
                        </div>
                    </div>
                    <button data-modal-toggle="addBuku" type="submit" class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Add Buku
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
    @if ($updateToggle)
    <!-- Modal Update Buku -->
    <div id="updateBuku" tabindex="-1" aria-hidden="true" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <!-- Modal content -->
            <div class="relative  rounded-lg shadow bg-gray-700 border-2 border-yellow-300">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-600">
                    <h3 class="text-lg font-semibold text-yellow-300">
                        Update Buku
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent   rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" wire:click="updateToggleClose">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form wire:submit="updateBuku" class="p-4 md:p-5">
                    <div class="mx-auto max-w-xs">
                        <img src="{{ asset("storage/buku/".$pathImage) }}" alt="">
                    </div>
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="judul" class="block mb-2 text-sm font-medium  text-white">Judul <span class="text-red-600 text-xs">*</span> </label>
                            <input wire:model.live="judul" type="text" name="judul" id="judul" class=" border   text-sm rounded-lg focus:ring-primary  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white dark:focus:ring-primary focus:border-primary" placeholder="wqewqewq Type product name" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penulis" class="block mb-2 text-sm font-medium text-white">penulis <span class="text-red-600 text-xs">*</span> </label>
                            <input wire:model.live="penulis" type="text" name="penulis" id="penulis" class=" border   text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="penulis" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penerbit" class="block mb-2 text-sm font-medium text-white">penerbit <span class="text-red-600 text-xs">*</span> </label>
                            <input wire:model.live="penerbit" type="text" name="penerbit" id="penerbit" class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="penerbit" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="tgl" class="block mb-2 text-sm font-medium text-white">Tgl Terbit <span class="text-red-600 text-xs">*</span> </label>
                            <input wire:model="tgl" type="date" name="tgl" id="tgl" class=" border   text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white focus:ring-primary focus:border-primary" placeholder="$2999" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">

                            <label class="block mb-2 text-sm font-medium text-white" for="file_input">Upload foto buku </label>
                            <input wire:model="image" class="block w-full text-sm  border rounded-lg cursor-pointer  text-gray-400 focus:outline-none bg-gray-700 border-gray-600 placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                            <p class="mt-1 text-sm  text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>

                        </div>

                        <div class="col-span-2">
                            <label for="sinopsis" class="block mb-2 text-sm font-medium text-white"> Sinopsis <span class="text-red-600 text-xs">*</span> </label>
                            <textarea wire:model.live="sinopsis" id="sinopsis" rows="4" class="block p-2.5 w-full text-sm  rounded-lg border   focus:border-blue-500 bg-gray-600 border-gray-500 dark:placeholder-gray-400 text-white focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write sinopsis here"></textarea>
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-yellow-300 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-yellow-600 dark:hover:bg-yellow-700 dark:focus:ring-yellow-800">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path>
                        </svg>
                        Update Buku
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>