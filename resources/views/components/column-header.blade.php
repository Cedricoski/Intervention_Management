
@php
    if($columnName == $sortColumn){
        if($sortDirection=='asc'){
            $currentSortDirection = 'asc';
            $sortDirection = 'desc';
        }else if($sortDirection=='desc'){
            $currentSortDirection = 'desc';
            $sortDirection = '';
        }else{
            $currentSortDirection='';
            $sortDirection = 'asc';
        }
    }else{
        $currentSortDirection = 'asc';
        $sortDirection = 'desc';
    }
    
@endphp
<div class="flex space-x-4 items-center">
    <a href="{{ route('interventions', array_merge(request()->query(), [ 'sortDirection'=> $sortDirection, 'sortColumn' => $columnName])) }}">
        <span>{{$slot}}</span>
    </a>
    @if($columnName==$sortColumn)
        @if($currentSortDirection=='asc')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
            </svg>  
        @elseif($currentSortDirection=='desc')
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
            </svg>
        @endif
    @endif
</div>
