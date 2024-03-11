<?php

namespace app\models;

use app\models\traits\HasTimestamps;
use yii\db\ActiveRecord;

/**
 * Model stores information about product category. Using for example for querying filters for products list.
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends ActiveRecord
{
    use HasTimestamps;

    public static function tableName(): string
    {
        return "{{%categories}}";
    }

    public function beforeSave($insert): bool
    {
        $this->setTimestamps();
        return parent::beforeSave($insert);
    }
}