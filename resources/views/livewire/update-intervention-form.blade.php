<form id="updateInterventionForm" x-show="show" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="space-y-8 divide-y divide-gray-200" wire:submit.prevent="update({{ $editDatas->id }})">

    <div class="la-ball-triangle-path la-dark la-3x">
        <div></div>
        <div></div>
        <div></div>
    </div>
    @csrf
    <div class="pt-8">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">Editer</h3>
            <p class="mt-1 text-sm text-gray-500">Modifiez et enregistrez votre intervention dans notre base de données!</p>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="name" class="block text-sm font-medium leading-6 text-gray-900">Libelle</label>
                <div class="mt-2">
                    <input type="text" name="name" wire:model="name" name="name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
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
                    <span class="text-yellow-300">Laissez ce champ vide au cas où vous ne voulez pas changer d'image</span>
                </div>

            </div>

            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Statut</label>
                <div class="flex">
                    <div class="relative flex items-start mt-4">

                        <button type="button" @click="$wire.statut()" :class="{ 'bg-indigo-500':{{$status===true?'true':'false'}}, 'bg-gray-200':{{$status===false?'true':'false'}} }" class="bg-gray-200 relative inline-flex h-6 w-11 flex-shrink-0 cursor-pointer rounded-full border-2 border-transparent transition-colors duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2" role="switch" aria-checked="false">
                            <span class="sr-only">Statut</span>
                            <!-- Enabled: "translate-x-5", Not Enabled: "translate-x-0" -->
                            <span aria-hidden="true" class="translate-x-0 pointer-events-none inline-block h-5 w-5 transform rounded-full bg-white shadow ring-0 transition duration-200 ease-in-out" :class="{ 'translate-x-5':{{$status===true?'true':'false'}}, 'translate-x-0':{{$status===false?'true':'false'}} }"></span>
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
                        <option class=" hover:bg-gray-300" value="{{ $solution->id }}" {{ $editDatas->solution_id===$solution->id?'selected=selected':'' }}>{{ $solution->title }}</option>
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
                        <option class=" hover:bg-gray-300" value="{{ $client->id }}" {{ $editDatas->client_id===$client->id?'selected=selected':'' }}>{{ $client->name }}</option>
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
                            <input wire:model="type_interventions_id" id="{{ $type->label }}" name="type_interventions_id" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="{{ $type->id }}" {{ $editDatas->type_interventions_id===$type->id?'checked=checked':'' }}>
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
<div x-show="close" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

      <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

      <div class="fixed inset-0  z-10 overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
          <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="close=false">
            <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
              <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" @click="close = false">
                <span class="sr-only">Close</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            <form action="{{ route('deleteSolution',['id'=>$solution->id]) }}" method="POST">
              @csrf
              <div class="sm:flex sm:items-start">
                <div class="mx-auto flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                  <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                  </svg>
                </div>
                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                  <h3 class="text-base font-semibold leading-6 text-gray-900" id="modal-title">Supprimer</h3>
                  <div class="mt-2">
                    <p class="text-sm text-gray-500">Voulez vous supprimer la solution?</p>
                  </div>
                </div>
              </div>
              <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Oui</button>
                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="close=false">Annuler</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
