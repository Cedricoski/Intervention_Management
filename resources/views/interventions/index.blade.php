@extends('layouts.app',['title'=>$title])

@section('content')
<div x-data="{open:false}">
        <livewire:interventions :interventions="$interventions" />    
</div>
@endsection