<?php

namespace paskuale75\comuni\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_stati".
 *
 * @property int $id
 * @property string|null $nome_stati
 * @property string|null $sigla_numerica_stati
 * @property string|null $sigla_iso_3166_1_alpha_3_stati
 * @property string|null $sigla_iso_3166_1_alpha_2_stati
 * @property string|null $cod_fisco
 */
class Nazione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_stati';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome_stati'], 'string', 'max' => 128],
            [['sigla_numerica_stati','cod_fisco'], 'string', 'max' => 4],
            [['sigla_iso_3166_1_alpha_3_stati'], 'string', 'max' => 3],
            [['sigla_iso_3166_1_alpha_2_stati'], 'string', 'max' => 2],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome_stati'                        => 'Nome Stati',
            'sigla_numerica_stati'              => 'Sigla Numerica Stati',
            'cod_fisco'                         => 'Belfiore',
            'sigla_iso_3166_1_alpha_3_stati'    => 'Sigla Iso 3166 1 Alpha 3 Stati',
            'sigla_iso_3166_1_alpha_2_stati'    => 'Sigla Iso 3166 1 Alpha 2 Stati',
        ];
    }


    /**
     * CUSTOM FUNCTIONS
     */

    public static function getContentFilterAsJson()
    {
        $types = self::find()->all();
        foreach ($types as $type){
            $tmpArray[]= ['id' => $type->id,'text'=>$type->nome_stati];
        }
        $json = json_encode($tmpArray);
        return $json;
    }

    public static function getContentFilter()
    {
        $types = self::find()->all();
        $listData = ArrayHelper::map($types,'id','nome_stati');
        return $listData;
    }
}
