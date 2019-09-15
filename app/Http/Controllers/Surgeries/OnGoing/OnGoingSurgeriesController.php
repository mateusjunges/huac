<?php

namespace HUAC\Http\Controllers\Surgeries\OnGoing;

use HUAC\Models\Surgery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class OnGoingSurgeriesController
{
    public function __invoke(Surgery $surgery)
    {
        if (Gate::denies('surgeries.on-going')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $surgery = Surgery::with('procedure')->find($surgery->id);

        return view('on-going-surgeries.on-going')->with([
            'surgery' => $surgery
        ]);
    }
}
