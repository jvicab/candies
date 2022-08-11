<?php

namespace App\Observers;

class CandyBarObserver
{
    public function saved($model)
    {
        $oldImage = \Request::get('old_imaqe');
        $model->image = 'image';

        if (!empty($model->image) && ($model->image != $oldImage)) {
            $tmpImage = storage_path() .'/tmp/'. $model->image;

            if (file_exists($tmpImage)) {
                $fullNewImage = public_path() .'/candy_bars/' . $model->image;
                $fullOldImage = public_path(). '/candy_bars/'. $oldImage;
                rename($tmpImage, $fullNewImage);
                if (!empty($oldImage) && file_exists($fullOldImage)) {
                    unlink($fullOldImage);
                }
            }
        }
    }

    public function deleting($model)
    {
        if (!empty($model->image)) {
            $fullImage = public_path() .'/candy_bars/'. $model->image;
            if (file_exists($fullImage)) {
                unlink($fullImage);
            }
        }
    }
}
