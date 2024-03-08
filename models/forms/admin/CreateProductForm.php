<?php

namespace app\models\forms\admin;

use app\models\Category;
use app\models\Product;
use app\models\Vendor;
use yii\base\Model;

class CreateProductForm extends Model
{
    public ?int $id = null;
    public int $price = 0;
    public string $name = '';
    public string $preview = '';
    public string $description = '';
    public int $vendor = 0;
    public int $category = 0;

    public function rules(): array
    {
        return [
            [['price', 'name', 'preview', 'description', 'vendor', 'category'], 'required'],
            [['id', 'price', 'vendor', 'category'], 'integer'],
            [['name', 'preview', 'description'], 'string'],
            ['vendor', 'validateVendor'],
            ['category', 'validateCategory'],
        ];
    }

    public function create(): ?Product
    {
        $product = new Product([
            'name' => $this->name,
            'price' => $this->price,
            'preview' => $this->preview,
            'description' => $this->description,
            'vendor_id' => $this->vendor,
            'category_id' => $this->category,
        ]);
        return $product->save() ? $product : null;
    }

    public function update(): bool|int
    {
        $product = Product::findOne($this->id);
        $product->name = $this->name;
        $product->price = $this->price;
        $product->preview = $this->preview;
        $product->description = $this->description;
        $product->vendor_id = $this->vendor;
        $product->category_id = $this->category;
        return $product->update();
    }

    private function validateVendor(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $vendor = $this->getVendor();
        if (is_null($vendor)) {
            $this->addError('vendor', 'Incorrect vendor id.');
        }
    }

    private function validateCategory(): void
    {
        if ($this->hasErrors()) {
            return;
        }
        $category = $this->getCategory();
        if (is_null($category)) {
            $this->addError('category', 'Incorrect category id.');
        }
    }

    private function getVendor(): ?Vendor
    {
        return Vendor::findOne($this->vendor);
    }

    private function getCategory(): ?Category
    {
        return Category::findOne($this->category);
    }
}