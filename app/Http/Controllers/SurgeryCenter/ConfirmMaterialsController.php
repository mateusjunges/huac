<?php

namespace HUAC\Http\Controllers\SurgeryCenter;

use Illuminate\Http\Request;

class ConfirmMaterialsController
{
    public function __invoke()
    {
        return view('surgery-center.confirm-materials');
    }
}
