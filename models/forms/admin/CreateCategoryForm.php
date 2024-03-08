<?php

namespace app\models\forms\admin;

use app\models\Category;
use yii\base\Model;

class CreateCategoryForm extends Model
{
    public ?int $id = null;
    public string $name = '';
    public string $description = '';

    public function rules(): array
    {
        return [
            [['name', 'description'], 'required'],
            ['id', 'integer'],
            [['name', 'description'], 'string'],
        ];
    }

    public function create(): ?Category
    {
        $vendor = new Category(['name' => $this->name, 'description' => $this->description]);
        return $vendor->save() ? $vendor : null;
    }

    public function update(): bool|int
    {
        $vendor = Category::findOne($this->id);
        $vendor->name = $this->name;
        $vendor->description = $this->description;
        return $vendor->update();
    }
}