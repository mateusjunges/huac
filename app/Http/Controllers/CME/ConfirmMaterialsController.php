<?php

namespace HUAC\Http\Controllers\CME;

use Illuminate\Http\Request;

class ConfirmMaterialsController
{
    public function __invoke()
    {
        return view('cme.confirm-materials');
    }
}
