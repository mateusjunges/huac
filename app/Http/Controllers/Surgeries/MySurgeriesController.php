<?php

namespace HUAC\Http\Controllers\Surgeries;

use Illuminate\Support\Facades\Gate;

class MySurgeriesController
{
    public function __invoke()
    {
        if (Gate::denies('surgeries.my-surgeries')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('surgeries.my-surgeries');
    }
}
