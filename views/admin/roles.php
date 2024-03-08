<?php
/**
 * @var \yii\rbac\Role[] $roles
 */
?>

<div class="account__content">
    <h2 class="account__content--title h3 mb-20">Roles</h2>
    <div class="account__table--area">
        <table class="account__table">
            <thead class="account__table--header">
            <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Name</th>
                <th class="account__table--header__child--items">Actions</th>
            </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
            <?php foreach ($roles as $role): ?>
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items"><?=$role->name?></td>
                    <td class="account__table--body__child--items">
                        <a href="<?= \yii\helpers\Url::to(['/admin/edit-role', 'role' => $role->name])?>" class="account__details--footer__btn" type="button">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>