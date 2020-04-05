<?php

namespace App\Http\Controllers\User;

use App\Services\Users\UsersService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Requests\UpdateUserSettingsRequest;

class UserSettingsController extends Controller
{
    /**
     * @var $usersService
     */
    private $usersService;

    public function __construct
    (
        UsersService $usersService
    )
    {
        $this->usersService = $usersService;
    }

    /**
     * Редактирование пользователя
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('user.settings',[
            'user' => collect(\Auth::user())->except(['password', 'user_roles_id'])
        ]);
    }

    /**
     * Редактирование пользователя
     *
     * @param UpdateUserSettingsRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserSettingsRequest $request)
    {
        $this->usersService->update($request->all());

        return redirect()->route('my.index');
    }
}
