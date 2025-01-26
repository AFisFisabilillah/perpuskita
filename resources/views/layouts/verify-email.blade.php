<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>verify emmail</title>
    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body>
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
                        Send Emial Verification 
                    </h1>

                    <form method="post" action="{{ route('verification.send') }}" class="space-y-4 md:space-y-6">
                        @csrf
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-200 dark:text-white">Resend Email Verification</label>
                            
                        </div>
                        <button type="submit" class="w-full text-white bg-primary hover:bg-primary-700 focus:ring-2 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary dark:hover:bg-primary-700 dark:focus:ring-primary-800 mt-2">
                            <p>Send Email</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>