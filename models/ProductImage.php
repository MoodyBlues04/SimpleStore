<?php

namespace app\models;

use app\models\traits\HasTimestamps;
use yii\db\ActiveRecord;

/**
 * Stores product's images
 *
 * @property int $id
 * @property int $product_id
 * @property string $path
 * @property string $created_at
 * @property string $updated_at
 */
class ProductImage extends ActiveRecord
{
    use HasTimestamps;

    public static function tableName(): string
    {
        return '{{%products_images}}';
    }

    public function beforeSave($insert): bool
    {
        $this->setTimestamps();
        return parent::beforeSave($insert);
    }

    public function product(): Product
    {
        /** @var Product */
        return $this->hasOne(Product::class, ['id' => 'product_id'])->one();
    }
}