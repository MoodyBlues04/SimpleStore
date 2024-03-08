<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $updated_at
 */
class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return "{{%categories}}";
    }
}