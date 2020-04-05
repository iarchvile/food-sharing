<?php


namespace App\Services\ProductsCards\Handlers;


class UpdateImageHandler
{
    /**
     * Редактирование изображений в хранилище
     *
     * @param $card
     * @param $photos
     * @return mixed
     */
    public function handler($card, $photos)
    {
        $imagePath = [];
        foreach ($card->photos as $key => $photo){
            if(!empty($photos[$key])){
                $imagePath[$key] = $photos[$key]->storeAs('image/product_cards/'.$card->id , 'photo_' . $key . '.' . $photos[$key]->extension(), 'public'); //example path: image/product_cards/10/photo_1.png
                $imagePath[$key] = 'http://'. request()->getHttpHost() .'/storage/' .$imagePath[$key];
            } else {
                $imagePath[] = $photo;
            }
        }
        return $imagePath;
    }
}
