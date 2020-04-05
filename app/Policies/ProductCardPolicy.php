<?php

namespace App\Policies;

use App\Models\ProductCard;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductCardPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any product cards.
     *
     * @param  \App\Models\User  $user
     *
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can view the product card.
     *
     * @param  \App\Models\User  $user
     * @param  ProductCard  $product_card
     *
     * @return mixed
     */
    public function view(User $user, ProductCard $product_card)
    {
        return $product_card->user_id === $user->id;
    }

    /**
     * Determine whether the user can create product cards.
     *
     * @param  \App\Models\User  $user
     *
     * @return mixed
     */
    public function create(User $user)
    {
        return true;
    }

    /**
     * Determine whether the user can update the product card.
     *
     * @param  \App\Models\User  $user
     * @param  ProductCard  $product_card
     *
     * @return mixed
     */
    public function update(User $user, ProductCard $product_card)
    {
        return $product_card->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the product card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductCard  $productCard
     *
     * @return mixed
     */
    public function delete(User $user, ProductCard $productCard)
    {
        dd('delete');

        return true;
    }

    /**
     * Determine whether the user can restore the product card.
     *
     * @param  \App\Models\User  $user
     * @param  ProductCard  $product_card
     *
     * @return mixed
     */
    public function restore(User $user, ProductCard $product_card)
    {
        return $product_card->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the product card.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ProductCard  $productCard
     *
     * @return mixed
     */
    public function forceDelete(User $user, ProductCard $productCard)
    {
        dd('forceDelete');

        return true;
    }
}
