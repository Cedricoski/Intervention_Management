<?php

use Illuminate\Support\Facades\Gate;

function isAdmin()
{
    return Gate::allows('isAdmin');
}