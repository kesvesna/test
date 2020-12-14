<?php

use yii\db\Migration;
use Faker\Factory;

/**
 * Class m201214_145340_company_table
 */
class m201214_145340_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201214_145340_company_table cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'inn' => $this->decimal(20,0)->notNull(),
            'dg' => $this->string(100)->notNull(),
            'address' => $this->string(100)->notNull(),
        ]);

        $faker = Factory::create();

        for($i = 0; $i < 10; $i++)
        {
            $counter_rates = [];
            for ($j = 0; $j < 10; $j++)
            {
                $counter_rates[] = [

                    $faker->company,   // name
                    $faker->bankAccountNumber,   // ИНН
                    $faker->name($gender = 'male'|'female') ,   // DG
                    $faker->address,   // address
                ];
            }
            Yii::$app->db->createCommand()->batchInsert('company', ['name', 'inn',
                'dg', 'address'], $counter_rates)->execute();
            unset($counter_rates);
        }
        //die('Data generation is complete!');
    }





    public function down()
    {
        $this->dropTable('company');
    }

}
