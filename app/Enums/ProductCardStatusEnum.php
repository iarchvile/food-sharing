<?php


namespace App\Enums;

/**
 * Статусы карточек продуктов
 *
 * Class ProductCardStatusEnum
 * @package App\Enums
 */
class ProductCardStatusEnum
{
    const AWAITING_MODERATION = 1; //ожидает модерации
    const ACTIVE = 2; //активен
    const COMPLETED = 3; //завершен
    const BLOCKED = 10; //заблокирован
    const REJECTED = 11; //отклонен
}
