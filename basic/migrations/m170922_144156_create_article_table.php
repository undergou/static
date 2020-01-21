<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m170922_144156_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article', [
            'id' => $this->primaryKey(),
            'author' => $this->string(),
            'title' => $this->string(),
            'slug' => $this->string(),
            'category_title' => $this->string(),
            'tag' => $this->string(),
            'date_create' => $this->date(),
            'date_updated' => $this->date(),
            'status' => $this->string(),
            'content' => $this->text(),
            'short_content' => $this->text(),
            'rating' => $this->integer()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
