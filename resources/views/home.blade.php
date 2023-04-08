@extends('layouts.app',['title'=>$title])

@section('content')

<div>

  <h3 class="text-base font-semibold leading-6 text-gray-900">Total</h3>
  <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
    <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
      <dt class="truncate text-sm font-medium text-gray-500">Mes Interventions</dt>
      <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">
        @if (isAdmin())
        {{count($interventions)}}
        @else
        {{auth()->user()->interventions()->count()}}
        @endif

      </dd>
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
  <?php
  foreach ($interventions_by_client as $value) {
    
    $datas[] = [$value->name => $value->interventions()->count()];
  }
  foreach ($interventions_by_user as $value) {
    
    $datas2[] = [$value->name => $value->interventions()->count()];
  }
  ?>
  <div class="flex justify-between">
    <div style="width: 600px;" class="mt-5 bg-white rounded-md p-5">
      <canvas id="ChartClient"></canvas>
    </div>
    <div style="width: 600px;" class="mt-5 bg-white rounded-md p-5">
      <canvas id="ChartAuteur"></canvas>
    </div>
  </div>

  <script>
    var ChartClient = null;
    var ChartAuteur = null;
    document.addEventListener('turbolinks:load', function() {
      if (ChartClient) {
        ChartClient.destroy();
      }

      if (ChartAuteur) {
        ChartAuteur.destroy();
      }

      if (window.location.href.indexOf("home") > -1) {

        const labels = [<?php foreach ($datas as $value) {
                          foreach ($value as $key => $val) {
                            echo "'" . $key . "'" . ",";
                          }
                        } ?>];

        const data = {
          labels: labels,
          datasets: [{
            label: 'Total Interventions',
            backgroundColor: 'rgb(99,102,241)',
            borderColor: 'rgb(99,102,241)',
            data: [<?php foreach ($datas as $value) {
                      foreach ($value as $key => $val) {
                        echo "'" . $val . "'" . ",";
                      }
                    } ?>],
          }]
        };

        const config = {
          type: 'bar',
          data: data,
          options: {}
        };

        const labels2 = [<?php foreach ($datas2 as $value) {
                            foreach ($value as $key => $val) {
                              echo "'" . $key . "'" . ",";
                            }
                          } ?>];

        const data2 = {
          labels: labels2,
          datasets: [{
            label: 'Total Interventions',
            backgroundColor: 'rgb(99,102,241)',
            borderColor: 'rgb(99,102,241)',
            data: [<?php foreach ($datas2 as $value) {
                      foreach ($value as $key => $val) {
                        echo "'" . $val . "'" . ",";
                      }
                    } ?>],
          }]
        };

        const config2 = {
          type: 'line',
          data: data2,
          options: {}
        };





        if (ChartClient != null) {
          ChartClient.destroy()
        }

        if (ChartAuteur != null) {
          ChartClient.destroy()
        }


        ChartClient = new Chart(document.getElementById('ChartClient'),
          config
        );

        ChartAuteur = new Chart(document.getElementById('ChartAuteur'),
          config2
        );

      }
    })
  </script>



</div>

@endsection