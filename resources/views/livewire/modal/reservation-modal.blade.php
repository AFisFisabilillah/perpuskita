<div>
    <div id="popup-modal" tabindex="-1" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-[99999] flex justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative  rounded-lg shadow bg-gray-900">
                <button wire:click="closeModal" type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center hover:bg-gray-600 hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    @if ($status == "pending")
                    <svg class="mx-auto mb-4  w-12 h-12 text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-4  w-12 h-12 text-green-600" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                        <path d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                    </svg>
                    @endif

                    @if ($status == "dipinjam")
                    <hr class="border-t-2 border-white/45 my-4">
                      <div class="text-left text-sm">
                        <h3 class="mb-5 text-md font-normal text-gray-300">Nama Nanjam : {{ $user }} </h3>
                        <h3 class="mb-5 text-md font-normal text-gray-300">Judul Buku : {{ $judul }} </h3>
                        <h3 class="mb-5 text-md font-normal text-gray-300">Tanggal pinjam : {{ $waktuAmbil }} </h3>
                        <h3 class="mb-5 text-md font-normal text-gray-300">Tanggal  Kembali : {{ $this->getDateNow() }} </h3>
                      </div>
                      <hr class="border-t-2 border-white/45 my-4">
                        <h3 class="mb-5 text-red-500 text-md font-normal ">Denda : Rp.{{ $this->denda() }} </h3>
                     @else
                     
                    @endif

                    <h3 class="mb-5 text-lg font-normal text-gray-400"> {{ $this->getMessageStatus() }} </h3>
                    <button wire:click="buttonAction" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </button>
                    <button wire:click="closeModal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium  focus:outline-none rounded-lg border    focus:z-10 focus:ring-4  focus:ring-gray-700 bg-gray-800 text-gray-400 border-gray-600 hover:text-white hover:bg-gray-700">No, cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>