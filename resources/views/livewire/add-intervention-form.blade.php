<form x-cloak id="addInterventionForm" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="space-y-8 divide-y divide-gray-200">


    <div class="pt-8">
        <div>
            <h3 class="text-base font-semibold leading-6 text-gray-900">Ajouter une intervention</h3>
            <p class="mt-1 text-sm text-gray-500">Enregistrez votre intervention dans notre base de données!</p>
        </div>
        <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label for="first-name" class="block text-sm font-medium leading-6 text-gray-900">Libelle</label>
                <div class="mt-2">
                    <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Date</label>
                <div class="mt-2">
                    <input type="date" name="last-name" id="last-name" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                </div>
            </div>
            <div class="sm:col-span-3">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Image</label>
                <div class="mt-2">
                    <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file">
                </div>

            </div>

            <div class="sm:col-span-3">
                <label for="last-name" class="block text-sm font-medium leading-6 text-gray-900">Statut</label>
                <div class="flex">
                    <div class="relative flex items-start mt-4">
                        <div class="flex h-6 items-center">
                            <input id="enCours" name="statut" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="En cours">
                        </div>
                        <div class="ml-3">
                            <label for="enCours" class="text-sm font-medium leading-6 text-gray-900">En cours</label>

                        </div>

                    </div>
                    <div class="relative flex items-start mt-4 ml-4">
                        <div class="flex h-6 items-center">
                            <input id="clos" name="statut" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600">
                        </div>
                        <div class="ml-3">
                            <label for="clos" class="text-sm font-medium leading-6 text-gray-900">Clos</label>

                        </div>

                    </div>
                </div>



            </div>


            <div class="sm:col-span-3">
                <label for="location" class="block text-sm font-medium leading-6 text-gray-900">Location</label>
                <select  id="location" name="solution" class="mt-2 block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    @foreach ($solutions as $solution )
                        <option class=" hover:bg-gray-300" value="{{ $solution->id }}">{{ $solution->title }}</option>
                    @endforeach
                </select>
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
                            <input id="{{ $type->label }}" name="type" type="radio" class="h-4 w-4 border-gray-300 text-indigo-600 focus:ring-indigo-600" value="{{ $type->label }}">
                        </div>
                        <div class="ml-3">
                            <label for="{{ $type->label }}" class="text-sm font-medium leading-6 text-gray-900">{{ $type->label }}</label>

                        </div>
                    </div>
                    @endforeach

                </div>
            </fieldset>
        </div>
    </div>

    <div class="pt-10 pb-10">
        <div class="flex justify-start">
            <button type="button" class="rounded-md bg-white py-2 px-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Cancel</button>
            <button type="submit" class="ml-3 inline-flex justify-center rounded-md bg-indigo-600 py-2 px-3 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
        </div>
    </div>

</form>