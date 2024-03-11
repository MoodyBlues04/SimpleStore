<?php

use yii\db\Migration;

/**
 * Class m240311_162631_create_product_photos
 */
class m240311_162631_create_product_photos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable('{{%products_images}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'path' => $this->string()->notNull(),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'product_id_foreign_key',
            'products_images',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable('{{%products_images}}');
    }
}
