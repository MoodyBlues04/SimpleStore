<?php
/**
 * @var \app\models\Category[] $categories
 */
?>

<div class="account__content">
    <h2 class="account__content--title h3 mb-20">Categories</h2>
    <a href="/admin/create-category" class="new__address--btn primary__btn mb-25" type="button">Add category</a>
    <div class="account__table--area">
        <table class="account__table">
            <thead class="account__table--header">
            <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Name</th>
                <th class="account__table--header__child--items">Description</th>
                <th class="account__table--header__child--items">Actions</th>
            </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
            <?php foreach ($categories as $category): ?>
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items"><?=$category->name?></td>
                    <td class="account__table--body__child--items"><?=$category->description?></td>
                    <td class="account__table--body__child--items">
                        <a href="<?= \yii\helpers\Url::to(['/admin/edit-category', 'id' => $category->id])?>" class="account__details--footer__btn" type="button">Edit</a>
                        <a href="<?= \yii\helpers\Url::to(['/admin/delete-category', 'id' => $category->id])?>" class="account__details--footer__btn" type="button">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>