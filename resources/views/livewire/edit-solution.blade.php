<form x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="open" x-data wire:submit.prevent="update({{$solution->id}})">
    @csrf
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
        <div class="mt-1">
            <input wire:model="title" type="text" name="title" id="title" class="block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
        </div>
    </div>
    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
        <div class="mt-1">
            <textarea wire:model="description" rows="4" name="description" id="description" class="block w-full rounded-md border-0 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:py-1.5 sm:text-sm sm:leading-6"></textarea>
        </div>
    </div>
    <div class="mt-4">
        <button type="submit" class="rounded-md bg-indigo-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Editer</button>
    </div>
</form>