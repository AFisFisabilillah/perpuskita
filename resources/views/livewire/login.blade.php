<div class="">
   
    <section class="bg-gradient-to-r from-slate-900 to-slate-700 dark:bg-gray-900 h-screen">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <a href="#" class="flex items-center mb-2 text-2xl font-bold text-primary dark:text-white">
                <img class="w-24 h-24" src="{{ asset('img/LOGO.png') }}" alt="logo">
                Perpuskita
            </a>
            <div class="w-full bg-gradient-to-r from-gray-800 to-gray-900 rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700 relative">
                <!-- Gambar Loading yang akan menggantikan form -->

                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold mb-2 leading-tight tracking-tight text-gray-300 md:text-2xl dark:text-white relative">
                        Sign in to your account
                        @error('loginFailed')
                        <p class="text-red-700 text-sm ml-2 mt-1 mb-2 absolute">{{ $message }}</p>
                        @enderror
                    </h1>

                    <form class="space-y-4 md:space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Your email</label>
                            <input wire:model="email" type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500  relative" placeholder="name@company.com" required="">
                            @error('email')
                            <p class="text-red-700 text-sm ml-2 mt-1 mb-2 absolute">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Password</label>
                            <input wire:model="password" type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 rounded-lg focus:ring-primary focus:border-primary block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                            @error('password')
                            <p class="text-red-700 text-sm ml-2 mt-1 mb-2 absolute ">{{ $message }}</p>
                            @enderror
                            <p><a class="text-primary font-semibold" href="{{ route("forgotPassword")}}">Forgot password ? </a></p>
                        </div>
                        <button type="button" wire:click="login" class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800 mt-2">
                            <p wire:loading.remove>Sign in</p>
                            <img wire:loading wire:target="login" src="{{ asset('img/loading.gif') }}" alt="loading" class="size-6">
                        </button>
                        <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                            Don’t have an account yet? <a wire:navigate href="{{ route('register') }}" class="font-medium text-primary hover:underline dark:text-primary-500">Sign up</a>

                        </p>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>