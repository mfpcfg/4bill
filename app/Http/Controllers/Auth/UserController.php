<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class UserController extends Controller
{
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

                return redirect('/cabinet');
            }
        }
        return redirect()->back()->withErrors('Пользователь с таким id не был найден');
    }
}
