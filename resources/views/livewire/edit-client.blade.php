<form x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="open" wire:submit.prevent="update({{$editDatas->id}})">
    @csrf
    <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
        <div class="sm:col-span-3">
            <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
            <div class="flex flex-auto items-center">
                <input wire:model="name" type="text" name="name" id="name" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">

            </div>
            @error('name')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="sm:col-span-3">
            <label for="address" class="block text-sm font-medium text-gray-700">Adresse</label>
            <div class="flex flex-auto items-center">
                <input wire:model="address" type="text" name="adress" id="address" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('address')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div class="sm:col-span-3">
            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
            <div class="flex flex-auto items-center">
                <input wire:model="email" type="email" name="email" id="email" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
            </div>
            @error('email')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <div class="mt-4">
        <button type="submit" class="rounded-md bg-indigo-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Valider</button>
    </div>
</form>