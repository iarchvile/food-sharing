<?php


namespace App\Services\ProductsCards\Handlers;


class StoreImageHandler
{
    /**
     * Сохранение изображений в хранилище
     *
     * @param $photos
     * @param $id
     * @return array
     */
    public function handler($photos, $id)
    {
        $imagePaths = [];
        foreach ($photos as $key => $photo){
            $imagePaths[$key] = $photo->storeAs('image/product_cards/'.$id, 'photo_' . $key . '.' . $photo->extension(), 'public'); //example path: image/product_cards/10/photo_1.png
            $imagePaths[$key] = 'http://'. request()->getHttpHost() .'/storage/' .$imagePaths[$key];

        }
        return $imagePaths;
    }
}
