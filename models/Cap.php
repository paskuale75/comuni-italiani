<?php
namespace paskuale75\comuni\models;

use Yii;

/**
 * This is the model class for table "italy_cap".
 *
 * @property int $istat
 * @property string|null $cap
 */
class Cap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'italy_cap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['istat'], 'required'],
            [['istat'], 'integer'],
            [['cap'], 'string', 'max' => 11],
            [['istat'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'istat' => 'Istat',
            'cap' => 'Cap',
        ];
    }
}
