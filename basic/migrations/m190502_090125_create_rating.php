<?php

use yii\db\Migration;

/**
 * Class m190502_090125_create_rating
 */
class m190502_090125_create_rating extends Migration
{
    /**
     * {@inheritdoc}
     */


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('rating', [
            'id' => $this->primaryKey(),
            'post' => $this->string(),
            'rate' => $this->integer(),
            'ip' => $this->string()
        ]);
    }

    public function down()
    {
        $this->dropTable('rating');
    }

}
