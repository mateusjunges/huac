<?php

namespace HUAC\Http\Controllers\Auth;

use HUAC\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Uepg\SGIAuthorizer\Auth\Controllers\LoginController as UEPGLoginController;

class LoginController extends UEPGLoginController
{
    /**
     * Log in the user
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector|string
     */
    public function login()
    {
        try{
            $login = parent::login();
//            If successfully logged in verify if the user already exists on the database.
//             If not, create him.
            if (Auth::check()){
                $user = User::firstOrCreate(['username' => Auth::user()->username], [
                    'name' => Auth::user()->nome,
                    'email' => Auth::user()->email,
                ]);
            }
        }catch (\Exception $exception){
            session()->forget('sgiauthorizer');
            return response($exception->getMessage(), Response::HTTP_BAD_REQUEST);
        }finally{
            return $login;
        }
    }
}
