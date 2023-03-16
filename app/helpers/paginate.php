
<?php

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

function paginate($items, $perPage = 10, $page = null, $options = [])
{
$page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
$items = $items instanceof Collection ? $items : Collection::make($items);
return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
}