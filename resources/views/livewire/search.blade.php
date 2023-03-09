<div class="relative flex flex-1" x-data="{ open : true }">
    <label for="search-field" class="sr-only">Search</label>
    <div class="relative w-full text-gray-400 focus-within:text-gray-600">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center">
            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
            </svg>
        </div>
        <input wire:model="query" @click="open=true" @click.away="open=false" id="search-field" class="block h-full w-full border-transparent py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 focus:border-transparent focus:placeholder-gray-400 focus:outline-none focus:ring-0 sm:text-sm" placeholder="Rechercher" type="search" name="search" wire:keydown.arrow-down="incrementIndex" wire:keydown.arrow-up.prevent="decrementIndex" wire:keydown.backspace="resetIndex" wire:keydown.enter="showSolution">
    </div>


    @if (strlen($query)>=2)
    <div x-show="open" class="absolute left-0 z-10 mt-16 w-full origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95">
        <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            @if (count($solutions)>0)
            @foreach ($solutions as $index => $solution)
            <a href="{{route('showSolution',['id'=>$solution->id])}}" class="{{ $index===$selectedIndex?'bg-gray-100 text-gray-900':'text-gray-700' }} block px-4 py-2 text-sm">{{$solution->title}}</a>
            @endforeach
            @else
            <span class="text-orange-500">0 résultats pour "{{$query}}"</span>
            @endif
        </div>
    </div>
    @endif
</div>