<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Открывам страницу в ЛК в зависимости от типа пользователя
     * @return Renderable
     */
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        if ($user) {
            if ($user->type === User::TYPE_ADMIN){

                $users = User::where('type', User::TYPE_USER)->paginate(3);

                return view('auth.admin', compact('users'));

            }

            $user_status = $user->status === User::STATUS_ACTIVE;

            return view('auth.user', compact('user','user_status'));
        }

        return view('login');
    }

    /**
     * Удалить пользователя (сменить статус)
     * @param int $id
     * @return RedirectResponse|Redirector
     */
    public function delete($id)
    {
       if ($id) {
           $user = User::where('id', $id)->first();
           if ($user) {

               $user->status = User::STATUS_DELETE;
               $user->save();

               return redirect('/home');
           }
       }
        return redirect()->back()->withErrors('Пользователь с таким id не был найден');
    }
}
