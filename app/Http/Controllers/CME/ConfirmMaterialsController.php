<?php

namespace HUAC\Http\Controllers\CME;

use Illuminate\Support\Facades\Gate;

class ConfirmMaterialsController
{
    public function __invoke()
    {
        if (Gate::denies('cme.view-pending-surgeries')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('cme.confirm-materials');
    }
}
