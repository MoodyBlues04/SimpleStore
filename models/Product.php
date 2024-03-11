<?php

namespace app\models;

use app\models\traits\HasTimestamps;
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
    use HasTimestamps;

    public static function tableName(): string
    {
        return "{{%products}}";
    }

    public function beforeSave($insert): bool
    {
        $this->setTimestamps();
        return parent::beforeSave($insert);
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

    /**
     * @return ProductImage[]
     */
    public function images(): array
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id'])->all();
    }

    public function getMainImagePath(): string
    {
        $images = $this->images();
        if (count($images)) {
            return $images[0]->path;
        }
        return 'no-image'; // TODO mb default img
    }
}