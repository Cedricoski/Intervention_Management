<form id="addInterventionForm" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="space-y-8 divide-y divide-gray-200" wire:submit.prevent="create">

    @csrf
    <div class="pt-8">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">Ajouter une intervention</h3>
            <p class="mt-1 text-sm text-gray-500">Enregistrez votre intervention dans notre base de données!</p>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Libelle</label>
                <div class="mt-2">
                    <input type="text" wire:model="name" name="name" id="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('name')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="sm:col-span-3">
                <label for="date" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                <div class="mt-2">
                    <input type="date" wire:model="date" name="date" id="date" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @error('date')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Image</label>
                <div class="mt-2">
                    <input wire:model="image" name="image" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" accept="image/*">
                    @error('image')
                    <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>

            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Statut</label>
                <div class="flex">
                    <div class="relative flex items-start mt-4">
                        <button type="button" @click="on=!on; $wire.set('status',on)" :class="{ 'bg-indigo-500':on, 'bg-gray-200':!on }" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="false">
                            <span class="sr-only">Statut</span>
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="{ 'translate-x-5':(on), 'translate-x-0':!(on) }"></span>
                        </button>

                    </div>

                </div>



            </div>


            <div class="sm:col-span-3">
                <label for="solution" class="block text-sm font-medium leading-6 text-gray-900">Solution</label>
                <div class="flex flex-auto items-center">
                    <select id="solution" wire:model="solution_id" name="solution_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option></option>
                        @foreach ($solutions as $solution )
                        <option class=" hover:bg-gray-300" value="{{ $solution->id }}">{{ $solution->title }}</option>
                        @endforeach
                    </select>
                    <a class="mt-2 hover:text-indigo-500" href="{{ route('solutions') }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                @error('solution_id')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>
            <div class="sm:col-span-3">
                <label for="client" class="block text-sm font-medium leading-6 text-gray-900">Client</label>
                <div class="flex flex-auto items-center">
                    <select id="client" wire:model="client_id" name="client_id" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                        <option></option>
                        @foreach ($clients as $client )
                        <option class=" hover:bg-gray-300" value="{{ $client->id }}">{{ $client->name }}</option>
                        @endforeach
                    </select>
                    <a class="mt-2 hover:text-indigo-500" href="#"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </a>
                </div>

                @error('client_id')
                <span class="text-red-400 text-sm">{{ $message }}</span>
                @enderror
            </div>


        </div>
    </div>

    <div class="pt-8">
        <div class="mt-2">
            <fieldset>
                <legend class="sr-only">Type Intervention</legend>
                <div class="text-sm font-semibold leading-6 text-gray-900" aria-hidden="true">Type Intervention</div>
                <div class="mt-4 space-y-4">
                    @foreach ($intervention_type as $type )
                    <div class="relative flex items-start">
                        <div class="flex h-6 items-center">
                            <input wire:model="type_interventions_id" id="{{ $type->label }}" name="type_interventions_id" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="{{ $type->id }}">
                            @error('type_interventions_id')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="ml-3">
                            <label for="{{ $type->label }}" class="text-sm font-medium leading-6 text-gray-900">{{ $type->label }}</label>
                            @error('type_intervention_id')
                            <span class="text-red-400 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endforeach

                </div>
            </fieldset>
        </div>
    </div>

    <div class="pt-10 pb-10">
        <div class="flex justify-start">
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Valider</button>
        </div>
    </div>

</form>
