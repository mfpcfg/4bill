<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
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
}
