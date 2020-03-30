<?php


namespace App\Services\Users\Repositories;

use App\Models\User;

class UsersRepository
{
    /**
     * Получить список пользователей
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return User::with('role')->get();
    }

    /**
     * Получить пользователя по id
     *
     * @param $userId
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|null
     */
    public function getUserById($userId){
        return User::with('role')->find($userId);
    }

    /**
     * Задать роль пользователю
     *
     * @param $user
     * @param $roleId
     */
    public function setUserRole($user, $roleId)
    {
        $user->user_roles_id = $roleId;
        $user->save();
    }
}
