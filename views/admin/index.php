<?php
/**
 * @var \app\models\User $admin
 */
?>

<div class="account__content">
    <h2 class="account__content--title h3 mb-20">Profile</h2>
    <div class="account__table--area">
        <table class="account__table">
            <thead class="account__table--header">
            <tr class="account__table--header__child">
                <th class="account__table--header__child--items">Name</th>
                <th class="account__table--header__child--items">Email</th>
                <th class="account__table--header__child--items">Email verified at</th>
                <th class="account__table--header__child--items">Roles</th>
            </tr>
            </thead>
            <tbody class="account__table--body mobile__none">
            <tr class="account__table--body__child">
                <td class="account__table--body__child--items"><?=$admin->username?></td>
                <td class="account__table--body__child--items"><?=$admin->email?></td>
                <td class="account__table--body__child--items"><?=$admin->email_verified_at?></td>
                <td class="account__table--body__child--items"><?=json_encode($admin->getRoleNames())?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
