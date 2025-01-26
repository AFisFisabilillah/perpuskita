
<nav class="bg-bg border-gray-200 dark:bg-gray-900 fixed z-[999] right-0 left-0">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-1">
    <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="{{ asset("img/LOGO.png") }}" class="h-16 " alt="Flowbite Logo" />
      <span class="self-center text-xl lg:text-2xl text-primary font-bold whitespace-nowrap dark:text-white">PERPUSKITA</span>
    </a>
    <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
      @if (session()->has('token'))
      <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="w-10 h-10 rounded-full cursor-pointer mx-8 hover:border hover:border-primary" src="{{ asset('storage/profile/'.$image) }}" alt="User dropdown">
      <!-- Dropdown menu -->
      <div id="userDropdown" class="z-10 hidden  divide-y  rounded-lg shadow w-44 bg-slate-900 divide-gray-600">
        <div class="px-4 py-3 text-sm text-white">
          <div>{{ $nama }}</div>
          <div class="font-medium truncate">{{ $email }}</div>
        </div>
        <ul class="py-2 text-sm text-gray-200" aria-labelledby="avatarButton">
          <li>
            <a href="{{route('profile') }}" class="block px-4 py-2 w-full text-center hover:bg-gray-600 hover:text-white">Dashboard</a>
          </li>
        </ul>
        <div class="py-1">
          <button type="button" wire:click="logout" href="#" class="block px-4 w-full py-2 text-sm hover:bg-gray-600 text-gray-200 hover:text-white">Sign out</button>
        </div>
      </div>

      @else
      <a wire:navigate href="{{ route('login') }}" class="text-white bg-primary hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 flex items-center gap-2">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
          <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
        </svg>
        <p>login</p>
      </a>
      @endif





      <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm rounded-lg md:hidden  focus:outline-none focus:ring-2 text-gray-400 hover:bg-gray-700 focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg  md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-bg dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <livewire:layout.nav-link nama="home" :active="request()->is('/')" />
        </li>
        <li>
          <livewire:layout.nav-link nama="buku" :active="request()->is('buku*')" />
        </li>
      </ul>
    </div>
  </div>
</nav>