<?php

//namespace paskuale75\comuni\migrations;

use Yii;
use yii\db\Migration;

class m200903_112001_create_all_tables extends Migration
{
    public function safeUp()
    {
        $sql = file_get_contents(__DIR__ . '/sql_files/full.sql');
        Yii::$app->db->pdo->exec($sql);
        /* $command = Yii::$app->db->createCommand($sql);
        $command->execute(); */

        // Make sure, we fetch all errors
        //while ($command->pdoStatement->nextRowSet()) {}
    }


    public function safeDown()
    {
    }
}
