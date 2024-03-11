<?php

namespace app\models;

use app\models\traits\HasTimestamps;
use yii\db\ActiveRecord;

/**
 * Vendor of products
 *
 * @property int $id
 * @property string $name
 * @property ?string $description
 * @property string $created_at
 * @property string $updated_at
 */
class Vendor extends ActiveRecord
{
    use HasTimestamps;

    public static function tableName(): string
    {
        return "{{%vendors}}";
    }

    public function beforeSave($insert): bool
    {
        $this->setTimestamps();
        return parent::beforeSave($insert);
    }
}