<?php


namespace App\Services\Users;

use App\Services\Users\Repositories\UsersRepository;

class UsersService
{
    /**
     * @var $usersRepository
     */
    private $usersRepository;

    public function __construct
    (
        UsersRepository $usersRepository
    )
    {
        $this->usersRepository = $usersRepository;
    }

    /**
     * Получить список пользователей
     *
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->usersRepository->getAll();
    }

    /**
     * Получить пользователя по id
     *
     * @param $userId
     * @return mixed
     */
    public function getUserById($userId)
    {
        return $this->usersRepository->getUserById($userId);
    }

    /**
     * Задать роль пользователю
     *
     * @param $user
     * @param $roleId
     */
    public function setUserRole($user, $roleId)
    {
        $this->usersRepository->setUserRole($user, $roleId);
    }
}
