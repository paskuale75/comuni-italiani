<?php

namespace paskuale75\comuni\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "italy_provincies".
 *
 * @property int $sigla
 * @property string|null $id_regione
 * @property string|null $provincia
 * @property float|null $superficie
 * @property int|null $residenti
 */
class Provincia extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'italy_provincies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sigla'], 'required'],
            [['id_regione', 'residenti'], 'integer'],
            [['superficie'], 'number'],
            [['provincia'], 'string', 'max' => 2],
            [['sigla'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sigla' => 'Sigla',
            'comune' => 'Comune',
            'id_regione' => 'id_regione',
            'provincia' => 'Provincia',
            'superficie' => 'Superficie',
            'residenti' => 'Num Residenti',
        ];
    }


    /**
     * RELATIONS
     */

    public function getid_regioneModel()
    {
        return $this->hasOne(Regioni::class, ['id_regione' => 'id_regione']);
    }

    public function getCapModel()
    {
        return $this->hasOne(Cap::class, ['istat' => 'istat']);
    }

    public function getCapsElenco()
    {
        return $this->hasMany(MultiCap::class, ['istat' => 'istat']);
    }



    /**
     * CUSTOM FUNCTIONS
     */

}
