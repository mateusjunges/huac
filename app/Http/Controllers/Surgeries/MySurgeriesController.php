<?php

namespace HUAC\Http\Controllers\Surgeries;

class MySurgeriesController
{
    public function __invoke()
    {
        return view('surgeries.my-surgeries');
    }
}
