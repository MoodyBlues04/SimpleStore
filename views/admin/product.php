<?php
/**
 * @var \app\models\Product[] $products
 */
?>

<div class="account__content">
    <h2 class="account__content--title h3 mb-20">Products</h2>
    <a href="/admin/create-product" class="new__address--btn primary__btn mb-25" type="button">Add product</a>
    <div class="account__table--area">
        <table class="account__table">
            <thead class="account__table--header">
            <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Name</th>
                <th class="account__table--header__child--items">Vendor</th>
                <th class="account__table--header__child--items">Category</th>
                <th class="account__table--header__child--items">Price</th>
                <th class="account__table--header__child--items">Preview</th>
                <th class="account__table--header__child--items">Description</th>
                <th class="account__table--header__child--items">Actions</th>
            </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
            <?php foreach ($products as $product): ?>
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items"><?=$product->name?></td>
                    <td class="account__table--body__child--items"><?=$product->vendor()->name?></td>
                    <td class="account__table--body__child--items"><?=$product->category()->name?></td>
                    <td class="account__table--body__child--items"><?=$product->price?></td>
                    <td class="account__table--body__child--items"><?=$product->preview?></td>
                    <?php
                    $description = $product->description;
                    if (strlen($description) > 20) {
                        $description = substr($description, 0, 20) . '...';
                    }
                    ?>
                    <td class="account__table--body__child--items"><?=$description?></td>
                    <td class="account__table--body__child--items">
                        <a href="<?= \yii\helpers\Url::to(['/admin/edit-product', 'id' => $product->id])?>" class="account__details--footer__btn" type="button">Edit</a>
                        <a href="<?= \yii\helpers\Url::to(['/admin/delete-product', 'id' => $product->id])?>" class="account__details--footer__btn" type="button">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>