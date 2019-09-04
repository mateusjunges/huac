<?php

namespace HUAC\Http\Controllers\Surgeries\OnGoing;

use HUAC\Models\Surgery;
use Illuminate\Http\Request;

class OnGoingSurgeriesController
{
    public function __invoke(Surgery $surgery)
    {
        $surgery = Surgery::with('procedure')->find($surgery->id);

        return view('on-going-surgeries.on-going')->with([
            'surgery' => $surgery
        ]);
    }
}
