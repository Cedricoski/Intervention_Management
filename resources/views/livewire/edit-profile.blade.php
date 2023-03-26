<div class="mb-5">
    @if (session()->has('message'))
    <div aria-live="assertive" class="pointer-events-none fixed inset-0 flex items-end px-4 py-6 sm:items-start sm:p-6 mt-11">
        <div class="flex w-full flex-col items-center space-y-4 sm:items-end">
            <div x-cloak x-data="{show:true}" x-show="show" x-init="setTimeout(()=>show=false,3000)" class="pointer-events-auto w-full max-w-sm overflow-hidden rounded-lg bg-white shadow-lg ring-1 ring-black ring-opacity-5" x-transition:enter="transform ease-out duration-300 transition" x-transition:enter-start="translate-y-2 opacity-0 sm:translate-y-0 sm:translate-x-2" x-transition:enter-end="translate-y-0 opacity-100 sm:translate-x-0" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <div class="p-4">
                    <div class="flex items-start">
                        <div class="flex-shrink-0">
                            <svg class="h-6 w-6 text-green-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-3 w-0 flex-1 pt-0.5">
                            <p class="text-sm font-medium text-gray-900">{{session("message")}}</p>

                        </div>
                        <div class="ml-4 flex flex-shrink-0">
                            <button @click="show=false" type="button" class="inline-flex rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                <span class="sr-only">Close</span>
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path d="M6.28 5.22a.75.75 0 00-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 101.06 1.06L10 11.06l3.72 3.72a.75.75 0 101.06-1.06L11.06 10l3.72-3.72a.75.75 0 00-1.06-1.06L10 8.94 6.28 5.22z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
    <form x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" x-show="open" wire:submit.prevent="update({{auth()->user()->id}})">
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
                <label for="pseudo" class="block text-sm font-medium text-gray-700">Pseudo</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="pseudo" type="text" name="pseudo" id="pseudo" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('pseudo')
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
            @if(isAdmin())
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
                @error('role_id')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            @endif

            <div class=" sm:col-span-6 border m-4"></div>
            <p class="sm:col-span-6 text-yellow-300">Laissez ces champs vides si vous ne voulez pas changer de mot de passe.</p>
            <div class="sm:col-span-3">
                <label for="password" wire:model="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="password" type="password" name="password" id="password" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
                @error('password')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="confirm_password" class="block text-sm font-medium text-gray-700">Confirmation du mot de passe</label>
                <div class="flex flex-auto items-center">
                    <input wire:model="password_confirmation" type="password" name="password_confirmation" id="confirm_password" class="w-full block rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            @error('password_confirmation')
            <span class="text-red-400 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mt-4">
            <button type="submit" class="rounded-md bg-indigo-600 py-2.5 px-3.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Valider</button>
        </div>
    </form>
</div>