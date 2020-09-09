<?php

namespace paskuale75\comuni\models;

use Yii;

/**
 * This is the model class for table "tbl_stati".
 *
 * @property int $id
 * @property string|null $nome_stati
 * @property string|null $sigla_numerica_stati
 * @property string|null $sigla_iso_3166_1_alpha_3_stati
 * @property string|null $sigla_iso_3166_1_alpha_2_stati
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
            [['sigla_numerica_stati'], 'string', 'max' => 4],
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
            'nome_stati' => 'Nome Stati',
            'sigla_numerica_stati' => 'Sigla Numerica Stati',
            'sigla_iso_3166_1_alpha_3_stati' => 'Sigla Iso 3166 1 Alpha 3 Stati',
            'sigla_iso_3166_1_alpha_2_stati' => 'Sigla Iso 3166 1 Alpha 2 Stati',
        ];
    }
}
