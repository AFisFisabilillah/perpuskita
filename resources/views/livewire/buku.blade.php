<div class="bg-gradient-to-tr from-gray-800 to-black py-36 px-10 min-h-screen">

    <div class="px-4 py-3 bg-bg rounded-full max-w-md mx-auto -mt-8 mb-10">

        <form class=" mx-auto">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input wire:keyup.debounce="search" wire:model="q" type="search" id="default-search" class="block w-full px-4 py-2 ps-10 text-sm  border rounded-lg    bg-gray-700 border-gray-600 placeholder-gray-400 text-white focus:ring-blue-500 focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                <button type="button" wire:click="deleteSearch" class="text-white absolute end-2.5 bottom-1  -translate-y-0.5 focus:ring-4 focus:outline-none  font-medium rounded-lg text-sm px-3 py-1  focus:ring-blue-800 hover:border hover:border-slate-400 box-border transition-all duration-200">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                        <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                    </svg>
                </button>
            </div>
        </form>

    </div>
    <!-- Card -->
    <div class="flex flex-wrap  justify-around gap-2 md:gap-4 lg:gap-8 w-full " wire:loading.remove>

        @foreach ($buku as $bk )

        @if($bk['status'] == 'tersedia')
        <!-- Tersedia -->
        <div wire:key="{{ $bk['id'] }}" class="lg:min-w-72  lg:max-h-96 max-w-40 max-h-60 md:max-w-64 md:max-h-72  flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-active border border-green-500">
            <a wire:navigate href="{{ route("detailukuBuku", $bk['id']) }}">
                <img class="rounded-lg object-cover lg:h-64 md:h-44 h-42 w-full" src="{{ asset('storage/buku/'.$bk['image']) }}" alt="" />
            </a>
            <div class=" px-2 md:px-5 py-1">
                <a href="#">
                    <h5 class="mb-1 md:text-lg text-md font-bold tracking-tight text-white">{{ $bk['judul'] }} <span class="bg-green-100 text-green-800 text-xs font-medium me-2 px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $bk['status'] }}</span></h5>
                </a>
                <p class="mb-3 font-normal text-sm md:text-md text-gray-400">{{ Str::limit($bk['sinopsis'], 28) }}</p>
            </div>
        </div>
        @elseif ($bk['status'] == 'reservasi')
        <!-- pending -->
        <div wire:key="{{ $bk['id'] }}" class="lg:min-w-72  lg:max-h-96 max-w-40 max-h-60 md:max-w-64 md:max-h-72   flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-pending border border-yellow-200">
            <a wire:navigate href="{{ route("detailukuBuku", $bk['id']) }}">
                <img class="rounded-lg object-cover lg:h-64 md:h-44 h-42 w-full" src="{{ asset('storage/buku/'.$bk['image']) }}"  alt="" />
            </a>
            <div class="px-2 md:px-5 py-1">
                <a href="#">
                    <h5 class="mb-1 md:text-lg text-lg font-bold tracking-tight text-white">{{ $bk['judul'] }} <span class="bg-yellow-200 text-yellow-600 text-xs font-medium me-2 px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $bk['status'] }}</span></h5>
                </a>
                <p class="mb-3 font-normal text-sm md:text-md text-gray-400">{{ Str::limit($bk['sinopsis'], 28) }}</p>
            </div>
        </div>
        @else
        <!-- Dipinjam -->
        <div wire:key="{{ $bk['id'] }}" class="lg:min-w-72  lg:max-h-96 max-w-40 max-h-60 md:max-w-64 md:max-h-72   flex-grow-0 rounded-lg shadow bg-gray-800  p-2 shadow-card-delete border border-red-400">
            <a wire:navigate href="{{ route("detailukuBuku", $bk['id']) }}">
                <img class="rounded-lg object-cover lg:h-64 md:h-44 h-42 w-full" src="{{ asset('storage/buku/'.$bk['image']) }}" alt="" />
            </a>
            <div class="px-2 md:px-5 py-1">
                <a href="#">
                    <h5 class="mb-1 md:text-lg text-lg font-bold tracking-tight text-white">{{ $bk['judul'] }} <span class="bg-red-300 text-red-600 text-xs font-medium me-2  px-1 md:px-2 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $bk['status'] }}</span></h5>
                </a>
                <p class="mb-3 font-normal text-sm md:text-md text-gray-400">{{ Str::limit($bk['sinopsis'], 28) }}</p>
            </div>
        </div>
        @endif
        @endforeach

    </div>



    <div wire:loading wire:target="search" class="flex items-center justify-center w-56 h-56 border border-gray-200 rounded-lg bg-white/10  dark:bg-gray-800 dark:border-gray-700 backdrop-blur-lg absolute right-1/2 translate-x-[7rem]">
        <div role="status" class="flex justify-center items-center w-full h-full">
            <svg aria-hidden="true" class="w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg ">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" />
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" />
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
    </div>


</div>