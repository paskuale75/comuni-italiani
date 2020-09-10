<?php

namespace paskuale75\comuni\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "italy_cities".
 *
 * @property int $istat
 * @property string|null $comune
 * @property string|null $regione
 * @property string|null $provincia
 * @property string|null $prefisso
 * @property string|null $cod_fisco
 * @property float|null $superficie
 * @property int|null $num_residenti
 */
class Citta extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'italy_cities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['istat'], 'required'],
            [['istat', 'num_residenti'], 'integer'],
            [['superficie'], 'number'],
            [['comune'], 'string', 'max' => 255],
            [['regione'], 'string', 'max' => 50],
            [['provincia'], 'string', 'max' => 2],
            [['prefisso'], 'string', 'max' => 7],
            [['cod_fisco'], 'string', 'max' => 10],
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
            'comune' => 'Comune',
            'regione' => 'Regione',
            'provincia' => 'Provincia',
            'prefisso' => 'Prefisso',
            'cod_fisco' => 'Cod Fisco',
            'superficie' => 'Superficie',
            'num_residenti' => 'Num Residenti',
        ];
    }


    /**
     * RELATIONS
     */

    public function getRegioneModel()
    {
        return $this->hasOne(Regioni::class, ['regione' => 'regione']);
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

    public static function getCapsFilterAsJson()
    {
        $types = self::find()->joinWith(['capsElenco ce'])->all();
        foreach ($types as $type) {
            $tmpArray[] = ['id' => $type->id, 'text' => $type->cap];
        }
        $json = json_encode($tmpArray);
        return $json;
    }
}
