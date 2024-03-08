<?php

namespace app\models\forms\admin;

use app\models\Vendor;
use yii\base\Model;

class CreateVendorForm extends Model
{
    public ?int $id = null;
    public string $name = '';

    public function rules(): array
    {
        return [
            ['name', 'required'],
            ['id', 'integer'],
            ['name', 'string'],
        ];
    }

    public function create(): ?Vendor
    {
        $vendor = new Vendor(['name' => $this->name]);
        return $vendor->save() ? $vendor : null;
    }

    public function update(): bool|int
    {
        $vendor = Vendor::findOne($this->id);
        $vendor->name = $this->name;
        return $vendor->update();
    }
}