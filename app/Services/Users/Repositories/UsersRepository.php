<?php


namespace App\Services\Users\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class UsersRepository
{
    /**
     * Получить список пользователей
     *
     * @return Builder[]|Collection
     */
    public function getAll()
    {
        return User::with('role')->get();
    }

    /**
     * Получить пользователя по id
     *
     * @param $userId
     *
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function getUserById($userId)
    {
        return User::with('role')->find($userId);
    }

    /**
     * Задать роль пользователю
     *
     * @param $user User
     * @param $roleId
     */
    public function setUserRole($user, $roleId)
    {
        $user->user_roles_id = $roleId;
        $user->save();
    }

    /**
     * @param $user User
     *
     * @return mixed
     */
    public function getUserCards($user)
    {
        return $user->productCard()->paginate();
    }
}
