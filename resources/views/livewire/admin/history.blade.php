<div>
    <section class="">
        <div class="mb-10">
            <h1 class="font-bold text-3xl ">History</h1>
        </div>
        <div class="px-4 mx-auto max-w-screen-2xl lg:px-6">
            <div class="relative overflow-hidden  shadow-md bg-gray-800 sm:rounded-lg">
                <div class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">All History:</span>
                            <span class="dark:text-white">{{ count($histories) }}</span>
                        </h5>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left  text-gray-400">
                        <thead class="text-xs  uppercase  bg-gray-700 text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">Judul</th>
                                <th scope="col" class="px-4 py-3">user</th>
                                <th scope="col" class="px-4 py-3">tgl pinjam</th>
                                <th scope="col" class="px-4 py-3">tgl kembali</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($histories as $history )

                            <tr class="border-b border-gray-600  hover:bg-gray-700">

                                <th scope="row" class="flex items-center px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <img src="https://flowbite.s3.amazonaws.com/blocks/application-ui/products/imac-front-image.png" alt="iMac Front Image" class="w-auto h-8 mr-3">
                                    {{ $history['buku']['judul'] }}
                                </th>
                                <td class="px-4 py-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 text-gray-400" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg>
                                    {{ $history['user']['name'] }}
                                </td>
                                <td class="px-4 py-2 font-medium  whitespace-nowrap text-white">
                                    <div class="flex items-center">

                                        {{ $history['waktu_pinjam']}}
                                    </div>
                                </td>
                                <td class="px-4 py-2">
                                    <p class="text-white">{{ $history['waktu_kembali']}}</p>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>
</div>