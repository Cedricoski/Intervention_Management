<div class="px-4 sm:px-6 lg:px-8">

    @if ($editDatas)
    <livewire:update-intervention-form :editDatas="$editDatas" />
    @endif
    <livewire:add-intervention-form />



    <div class="sm:flex sm:items-center">
        <div class="sm:flex-auto">

            <p class="mt-2 text-sm text-gray-700">La liste de vos interventions</p>
        </div>
        @if (isAdmin())
        <div class="items-center flex">

            <div class="flex relative">

                <input id="test" wire:model="queryAuteur" type="text" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Rechercher un auteur" data-autofocus>
                <svg class="h-5 w-5 absolute right-0 mt-2 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
                </svg>
            </div>
            <div class=" ml-5">
                <select id="status" wire:model="queryStatus" name="role_id" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="yes">Statut</option>

                    <option value=true>En cours</option>
                    <option value=false>Clos</option>

                </select>
            </div>
            <div class=" ml-5">


                <select id="client" wire:model="queryClient" name="client_id" class=" block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                    <option value="0">Client</option>
                    @foreach ($clients as $client )
                    <option class=" hover:bg-gray-300" value="{{ $client->id }}">{{$client->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        @endif
        <div class="mt-4 sm:mt-0 sm:ml-16 sm:flex-none">
            <button type="button" class="block rounded-md bg-indigo-600 py-1.5 px-3 text-center text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600" onclick="document.getElementById('addInterventionForm').reset();" @click="open=!open; show=false;showBox=false; $wire.resetDatas();{{ $editDatas?'$wire.resetEditDatas()':'' }}">Ajouter</button>
        </div>

    </div>
    <div class="mt-8 flow-root">
        <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Nom</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Client</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Date</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Statut</th>
                                <th scope="col" class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">Auteur</th>
                                <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 bg-white">

                            @if (count($intervent)>0)
                            @foreach ($intervent as $intervention)
                            <tr>

                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$intervention->name}}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">{{$intervention->client->name}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$intervention->date}}</td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $intervention->status===1?'bg-green-100 text-green-800':'bg-red-100 text-red-800'}}  capitalize">{{$intervention->status===1?'En cours':'Clos'}}</span></td>
                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    @if ($intervention->user)
                                    {{$intervention->user->name}}
                                    @endif

                                </td>

                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <button @click="showBox=true; open=false; show=false" wire:click="getDatas({{$intervention->id}})" class=" hover:text-indigo-700 inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        </svg>

                                    </button>
                                    @if (isAdmin())
                                    <button @click="show=!show; open=false; showBox=false; $wire.resetDatas();
                                    {{ $editDatas?'$wire.resetEditDatas()':'' }}" wire:click="getDataForEdit({{$intervention->id}})" class=" hover:text-indigo-700 inline-block"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                        </svg></button>
                                    <button @click="close=!close" wire:click="getDataForDelete({{$intervention->id}})" class=" hover:text-indigo-700 inline-block">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                        </svg>


                                    </button>
                                    @endif

                                </td>

                            </tr>
                            @endforeach

                            @else
                            <tr>
                                <td colspan="6" class=" text-center font-extralight">Aucune donnée disponible pour "{{ $queryAuteur }}"</td>
                            </tr>
                            @endif



                            <!-- More people... -->
                        </tbody>
                    </table>

                </div>


            </div>
            {{ $intervent->links() }}
        </div>
        @if (count($datas)>0)
        <div class="relative z-10" @keydown.window.escape="showBox=false; $wire.resetDatas();{{ $editDatas?'$wire.resetEditDatas()':'' }}" x-show="showBox">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" x-show="showBox" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"></div>

            <div class="fixed inset-0 z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-6xl sm:p-6" x-show="showBox" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="showBox = false; $wire.resetDatas();{{ $editDatas?'$wire.resetEditDatas()':'' }}">
                        <div>
                            <div class="mt-3 text-center sm:mt-5">


                                @foreach ($datas as $data)
                                <h1 class="text-3xl m-10 font-semibold leading-6 text-gray-900" id="modal-title">{{$data->name}}</h1>

                                <div>
                                    <img src="{{asset('storage/images/'.$data->image)}}" style="width:800px; display:inline-block;"></td>
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <tbody class="bg-white">
                                            <!-- Odd row -->

                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">Nom</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$data->name}}</td>
                                            </tr>
                                            <tr class="bg-gray-50">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3 ">Client</td>
                                                @if($data->client)
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$data->client->name}}</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">Intervenant</td>
                                                @if($data->user)
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$data->user->name}}</td>
                                                @endif

                                            </tr>
                                            <tr class="bg-gray-50">
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">Status</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500"><span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-medium {{ $data->status===1?'bg-green-100 text-green-800':'bg-red-100 text-red-800'}}  capitalize">{{$data->status===1?'En cours':'Clos'}}</span></td>
                                            </tr>
                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">Date</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{$data->date}}</td>
                                            </tr>

                                            <tr>
                                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">Solution</td>
                                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                                    @if ($data->solution)

                                                    <a class=" hover:text-indigo-500" href="{{ route('showSolution',['id'=>$data->solution->id]) }}">Cliquez ici pour voir la solution</a>
                                                    @else
                                                    Aucune solution
                                                    @endif
                                                </td>
                                            </tr>
                                            <!-- More people... -->
                                        </tbody>
                                    </table>
                                </div>





                                @endforeach



                            </div>
                        </div>
                        <div class="mt-5 sm:mt-6 sm:grid sm:grid-flow-row-dense sm:grid-cols-2 sm:gap-3">
                            <button @click="showBox=false; $wire.resetDatas();{{ $editDatas?'$wire.resetEditDatas()':'' }}" type="button" class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 px-4 py-2 text-base font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Retour</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @if ($deleteDatas)
        <div @keydown.window.escape="close=false;{{ $deleteDatas?'$wire.resetDeleteDatas()':'' }}" x-show="close" class="relative z-10" aria-labelledby="modal-title" role="dialog" aria-modal="true" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">

            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

            <div class="fixed inset-0  z-10 overflow-y-auto">
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white px-4 pt-5 pb-4 text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-lg sm:p-6" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" @click.away="close=false">
                        <div class="absolute top-0 right-0 hidden pt-4 pr-4 sm:block">
                            <button type="button" class="rounded-md bg-white text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" @click="close = false;{{ $deleteDatas?'$wire.resetDeleteDatas()':'' }}">
                                <span class="sr-only">Close</span>
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>

                        <form wire:submit.prevent="delete({{ $deleteDatas->id }})">
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
                                        <p class="text-sm text-gray-500">Voulez vous supprimer l'intervention?</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse">
                                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-red-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-red-500 sm:ml-3 sm:w-auto">Oui</button>
                                <button type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto" @click="close=false;{{ $deleteDatas?'$wire.resetDeleteDatas()':'' }} ">Annuler</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>



</div>