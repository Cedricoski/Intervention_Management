@extends('layouts.app',['title'=>$title])

@section('content')

<div >

  <h3 class="text-base font-semibold leading-6 text-gray-900">Total</h3>
  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
      <dt class="truncate text-sm font-medium text-gray-500">Mes Interventions</dt>
      <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{auth()->user()->interventions()->count()}}</dd>
    </div>

    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
      <dt class="truncate text-sm font-medium text-gray-500">Mes Interventions en cours</dt>
      <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{auth()->user()->interventions()->online()->count()}}</dd>
    </div>

    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
      <dt class="truncate text-sm font-medium text-gray-500">Mes Interventions cloturées</dt>
      <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{auth()->user()->interventions()->offline()->count()}}</dd>
    </div>
  </dl>
</div>

@endsection