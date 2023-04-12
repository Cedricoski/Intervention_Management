<div>
    <h3 class="text-base font-semibold leading-6 text-gray-900">Total</h3>
    <div class="items-center flex">
        @if(isAdmin())
        <div class="flex relative mr-5">
            <input id="test" wire:model="queryAuteur" type="text" class="block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Rechercher un auteur" data-autofocus>
            <svg class="h-5 w-5 absolute right-0 mt-2 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z">
            </svg>
        </div>
        @endif
        <div>
            <input type="text"  placeholder="Rechercher par date" wire:model="queryDate" class=" block w-full rounded-md border-0 py-1.5 pl-3 pr-10 text-gray-900 ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" name="daterange" />
        </div>
        <script>
            $(function() {
                $('input[name="daterange"]').daterangepicker({
                    opens: 'left',
                    autoUpdateInput: false,

                    locale: {

                        format: 'DD/MM/YYYY',
                        "applyLabel": "Appliquer",
                        "cancelLabel": "Annuler",
                        "fromLabel": "De",
                        "toLabel": "A",
                        "customRangeLabel": "Modifier",
                        "daysOfWeek": [
                            "Dim",
                            "Lun",
                            "Mar",
                            "Mer",
                            "Jeu",
                            "Ven",
                            "Sam"
                        ],
                        "monthNames": [
                            "Janvier",
                            "Février",
                            "Mars",
                            "Avril",
                            "Mai",
                            "Juin",
                            "Juillet",
                            "Août",
                            "Septembre",
                            "Octobre",
                            "Novembre",
                            "Décembre"
                        ]
                    }
                });
                $('input[name="daterange"]').on('apply.daterangepicker', function(ev, picker) {
                    $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));

                    @this.set('queryDate', ev.target.value);
                });

                $('input[name="daterange"]').on('cancel.daterangepicker', function(ev, picker) {
                    $(this).val('');
                    @this.set('queryDate', ev.target.value);
                });
            });
        </script>

    </div>
    <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Interventions</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                @if (isAdmin())
                {{count($interventions)}}
                @else
                {{count($interventions)}}
                @endif

            </dd>
        </div>

        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Interventions en cours</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                @if($onlineInterventions)
                {{count($onlineInterventions)}}
                @else
                {{auth()->user()->interventions()->online()->count()}}
                @endif
            </dd>
        </div>

        <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Interventions cloturées</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
                @if($offlineInterventions)
                {{count($offlineInterventions)}}
                @else
                {{auth()->user()->interventions()->offline()->count()}}
                @endif
            </dd>
        </div>
    </dl>
</div>