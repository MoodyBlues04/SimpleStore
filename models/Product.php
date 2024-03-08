<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property int $category_id
 * @property int $vendor_id
 * @property string $name
 * @property int $price
 * @property string $preview
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Product extends ActiveRecord
{
    public static function tableName(): string
    {
        return "{{%products}}";
    }

    public function vendor(): Vendor
    {
        /** @var Vendor */
        return $this->hasOne(Vendor::class, ['id' => 'vendor_id'])->one();
    }

    public function category(): Category
    {
        /** @var Category */
        return $this->hasOne(Category::class, ['id' => 'category_id'])->one();
    }
}