<?php


namespace App\Enums;

/**
 * Роли пользователей
 *
 * Class UserRoleEnum
 * @package App\Enums
 */
class UserRoleEnum
{
    const USER = 2; //зарегистрированный пользователь
    const MODERATOR = 3; //модератор
    const ADMIN = 4; // администратор
}