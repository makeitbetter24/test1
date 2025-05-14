<?php

use yii\db\Migration;

class m250514_141540_init extends Migration
{
    public function safeUp()
    {
        $this->execute(file_get_contents(__DIR__ . '/data/init.sql'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m250514_141540_init cannot be reverted.\n";

        //return false;
    }
}
