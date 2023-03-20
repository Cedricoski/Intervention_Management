<div class="flex flex-col md:pl-64">
  <div class="sticky top-0 z-10 flex h-16 flex-shrink-0 bg-white shadow">
    <button type="button" class="border-r border-gray-200 px-4 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="open = true">
      <span class="sr-only">Open sidebar</span>
      <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
      </svg>
    </button>
    <div class="flex flex-1 justify-between px-4">
      <livewire:search/>
      <div class="ml-4 flex items-center md:ml-6">
        <h1 class="uppercase">{{auth()->user()->name}}</h1>

        <!-- Profile dropdown -->
        <div x-cloak class="relative ml-3" x-data='{ open : false, activeIndex:false}'>
          <div>
            <button @click="open = !open" type="button" class="flex max-w-xs items-center rounded-full bg-white text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="sr-only">Open user menu</span>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
              </svg>

            </button>
          </div>
          <div x-show="open" @click.away="open=false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <a href="{{ route('profile') }}" @mousemove="activeIndex=0" @mouseleave="activeIndex=false" :class="{ 'bg-gray-100': activeIndex===0}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profil</a>
            <a href="{{ route('logout') }}" @mousemove="activeIndex=2" @mouseleave="activeIndex=false" :class="{ 'bg-gray-100': activeIndex===2}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Deconnexion</a>
            <form method="post" action="{{ route('logout') }}" id="logout-form">
              @csrf
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>