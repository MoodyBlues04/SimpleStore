<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m240308_153612_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'vendor_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
            'preview' => $this->text(),
            'description' => $this->text(),
            'created_at' => $this->string()->notNull(),
            'updated_at' => $this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'vendor_id_foreign_key',
            'products',
            'vendor_id',
            'vendors',
            'id',
            'CASCADE'
        );
        $this->addForeignKey(
            'category_id_foreign_key',
            'products',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
