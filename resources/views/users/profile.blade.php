@extends('layouts.app')

@section('content')
<div x-cloak x-data="{ open:false }">
    <livewire:edit-profile/>
    <livewire:profile />
</div>


@endsection