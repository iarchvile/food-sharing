<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\UserRole;
use App\Enums\UserRoleEnum;
use App\Services\Users\UsersService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
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
     * Получить список пользователей
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('admin.user.index', [
            'users' => $this->usersService->getAll(),
        ]);
    }

    /**
     * Получить пользователя
     *
     * @param User $user
     *
     * @return Factory|View
     */
    public function edit(User $user)
    {
        return view('admin.user.edit', [
            'user' => $this->usersService->getUserById($user->id),
            'userRoles' => UserRole::where('id', '!=', UserRoleEnum::ADMIN)->get(),
        ]);
    }

    //TODO провалидировать user_roles_id на существующий id из enum

    /**
     * Отредактировать данные у пользователя (роль)
     *
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'user_roles_id' => 'integer|nullable',
        ]);

        $roleId = $request->get('user_roles_id');
        if(!empty($roleId)){
            $this->usersService->setUserRole($user, $roleId);
        }

        return redirect()->route('admin.user');
    }

    /**
     * Удалить пользователя
     *
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(User $user)
    {
        //
        return redirect()->route('admin.user');
    }
}
