<?php
namespace paskuale75\comuni\models;

use Yii;

/**
 * This is the model class for table "italy_multicap".
 *
 * @property int $istat
 * @property string|null $comune
 * @property string $cap
 */
class MultiCap extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'italy_multicap';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['istat', 'cap'], 'required'],
            [['istat'], 'integer'],
            [['comune'], 'string', 'max' => 255],
            [['cap'], 'string', 'max' => 11],
            [['istat', 'cap'], 'unique', 'targetAttribute' => ['istat', 'cap']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'istat' => 'Istat',
            'comune' => 'Comune',
            'cap' => 'Cap',
        ];
    }
}
