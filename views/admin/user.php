<?php
/**
 * @var \app\models\User $admin
 * @var \app\models\User[] $users
 */
?>

<div class="account__content">
    <h2 class="account__content--title h3 mb-20">Users</h2>
    <div class="account__table--area">
        <table class="account__table">
            <thead class="account__table--header">
            <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Name</th>
                <th class="account__table--header__child--items">Email</th>
                <th class="account__table--header__child--items">Email verified at</th>
                <th class="account__table--header__child--items">Roles</th>
                <th class="account__table--header__child--items">Actions</th>
            </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
            <?php foreach ($users as $user): ?>
                <tr class="account__table--body__child">
                    <td class="account__table--body__child--items"><?=$user->username?></td>
                    <td class="account__table--body__child--items"><?=$user->email?></td>
                    <td class="account__table--body__child--items"><?=$user->email_verified_at?></td>
                    <td class="account__table--body__child--items"><?=json_encode($user->getRoleNames())?></td>
                    <td class="account__table--body__child--items">
                        <a href="<?= \yii\helpers\Url::to(['/admin/edit-user', 'id' => $user->id])?>" class="account__details--footer__btn" type="button">Edit</a>
                        <a href="/admin/delete-user" class="account__details--footer__btn" type="button">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>