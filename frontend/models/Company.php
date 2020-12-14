<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property float $inn
 * @property string $dg
 * @property string $address
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'dg', 'address'], 'required'],
            [['inn'], 'number'],
            [['name', 'dg', 'address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название компании',
            'inn' => 'ИНН',
            'dg' => 'Ген. директор',
            'address' => 'Адрес',
        ];
    }
}
