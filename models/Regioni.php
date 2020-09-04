<?php

namespace paskuale75\comuni\models;

use Yii;

/**
 * This is the model class for table "italy_regions".
 *
 * @property int $id_regione
 * @property string|null $regione
 * @property string|null $capoluogo
 * @property float|null $superficie
 * @property int|null $num_residenti
 * @property int|null $num_comuni
 * @property int|null $num_provincie
 * @property string|null $presidente
 * @property string|null $cod_istat
 * @property string|null $cod_fiscale
 * @property string|null $piva
 * @property string|null $pec
 * @property string|null $sito
 * @property string|null $sede
 */
class Regioni extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'italy_regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_regione'], 'required'],
            [['id_regione', 'num_residenti', 'num_comuni', 'num_provincie'], 'integer'],
            [['superficie'], 'number'],
            [['regione'], 'string', 'max' => 50],
            [['capoluogo', 'presidente'], 'string', 'max' => 45],
            [['cod_istat'], 'string', 'max' => 2],
            [['cod_fiscale', 'piva'], 'string', 'max' => 11],
            [['pec', 'sito'], 'string', 'max' => 100],
            [['sede'], 'string', 'max' => 255],
            [['id_regione'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_regione' => 'Id Regione',
            'regione' => 'Regione',
            'capoluogo' => 'Capoluogo',
            'superficie' => 'Superficie',
            'num_residenti' => 'Num Residenti',
            'num_comuni' => 'Num Comuni',
            'num_provincie' => 'Num Provincie',
            'presidente' => 'Presidente',
            'cod_istat' => 'Cod Istat',
            'cod_fiscale' => 'Cod Fiscale',
            'piva' => 'Piva',
            'pec' => 'Pec',
            'sito' => 'Sito',
            'sede' => 'Sede',
        ];
    }
}
