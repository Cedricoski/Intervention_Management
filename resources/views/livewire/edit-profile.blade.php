<div class="mb-5">
    <form x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="open">
        @csrf
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="name" type="text" name="name" id="name" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="pseudo" type="text" name="pseudo" id="pseudo" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="email" type="email" name="email" id="email" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
                <div class="flex flex-auto items-center">
                    <select id="role_id" wire:model="role_id" name="role_id" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option></option>
                        @foreach ($roles as $role)
                        <option value="{{$role->id}}" {{$role->id===auth()->user()->role_id?'selected=selected':''}}>{{ $role->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="password" wire:model="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="password" type="password" name="password" id="password" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="confirm_password" type="password" name="confirm_password" id="confirm_password" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="rounded-md bg-indigo-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Valider</button>
        </div>
    </form>
</div>