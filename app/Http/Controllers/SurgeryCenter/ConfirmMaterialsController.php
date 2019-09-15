<?php

namespace HUAC\Http\Controllers\SurgeryCenter;

use Illuminate\Support\Facades\Gate;

class ConfirmMaterialsController
{
    public function __invoke()
    {
        if (Gate::denies('surgery-center.confirm-materials')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('surgery-center.confirm-materials');
    }
}
