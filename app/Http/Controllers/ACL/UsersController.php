<?php

namespace HUAC\Http\Controllers\ACL;

use Exception;
use HUAC\Http\Requests\UsersRequest;
use HUAC\Models\User;
use Illuminate\Http\Request;
use HUAC\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('users.index')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        return view('ACL.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Gate::denies('users.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }
        return view('ACL.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if (Gate::denies('users.create')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        $user = User::create($request->all());
        $message = array(
            'title' => trans('huac.success'),
            'text'  => trans('huac.user_saved_successfully'),
            'type'  => 'success',
        );
        session()->flash('message', $message);
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if (Gate::denies('users.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        return view('ACL.users.edit')->with([
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (Gate::denies('users.update')) {
            $message = array(
                'title' => 'Acesso negado!',
                'text' => 'Você não possui permissão para acessar esta área do sistema!',
                'type' => 'warning',
            );
            session()->flash('message', $message);
            return redirect()->back();
        }

        if ($request->input('password') === null) {
          $user->update($request->except('password'));
        } else {
            $user->update($request->all());
        }
        $message = array(
            'type' => 'success',
            'title' => trans('huac.success'),
            'text' => trans('huac.user_updated_successfully'),
        );
        session()->flash('message', $message);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @throws Exception
     */
    public function destroy(User $user)
    {
        if (Gate::denies('users.delete')) {
            return response()->json([
                'code'  => Response::HTTP_UNAUTHORIZED,
                'title' => 'Acesso negado!',
                'text'  => 'Você não tem permissão para realizar esta ação no sistema!',
                'icon'  => 'warning',
                'timer' => 5000,
            ]);
        }

        $user->delete();

        return response()->json([
           'code'  => Response::HTTP_OK,
           'title' => trans('huac.success'),
           'text'  => trans('huac.successfully_deleted'),
           'icon'  => 'success',
           'timer' => 5000,
        ]);
    }
}
