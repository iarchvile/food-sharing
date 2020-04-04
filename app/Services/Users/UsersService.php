<?php


namespace App\Services\Users;

use App\Services\Geocode\GeocodeService;
use App\Services\Users\Repositories\UsersRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

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
     * @return Builder[]|Collection
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

    /**
     * @param $user
     *
     * @return mixed
     */
    public function getUserCards($user)
    {
        return $this->usersRepository->getUserCards($user);
    }

    /**
     * Найти пользователя по номеру телефона
     *
     * @param $phone
     * @return Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getUserByPhone($phone)
    {
        return $this->usersRepository->getUserByPhone($phone);
    }

    /**
     * Редактирование пользователя
     *
     * @param $data
     */
    public function update($data)
    {
        $user = \Auth::user();

        $user->fill([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'address' => $data['address'],
            'latitude' => $data['latitude'],
            'longitude' => $data['longitude'],
        ]);

        $this->usersRepository->update($user);
    }
}
