<div class="px-3">
    <div class="flex w-full mt-8 justify-center flex-wrap gap-3 lg:justify-normal">
        <div class="">
            <img class="size-40 lg:size-40 rounded-full shadow-card-green" src="{{ asset('img/bd1.jpg') }} " alt="">
        </div>
        <div class="mx-14 mt-4 relative">
            <p class="text-2xl lg:text-4xl text-center md:text-left text-white/90 font-bold">{{ $nama }}</p>
            <p class="lg:text-xl text-lg md:text-left text-white/90 lg:font-semibold font-medium text-center lg:text-left lg:mt-4">{{ $email }}</p>

            <div class="lg:absolute lg:bottom-6 md:ml-0 ml-6 mt-4">
                <button class="px-4 py-2 lg:px-5 lg:py-2.5 bg-primary text-white  rounded-lg  text-sm lg:text-md font-normal lg:font-medium">Edit Profile</button>
            </div>
        </div>
    </div>
</div>