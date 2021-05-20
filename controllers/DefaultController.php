<?php

namespace paskuale75\comuni\controllers;


use Faker\Provider\DateTime;
use paskuale75\comuni\models\Citta;
use paskuale75\comuni\models\MultiCap;
use paskuale75\comuni\models\Nazione;
use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;
use yii\web\Controller;

/**
 * Default controller for the `anagrafica` module
 */
class DefaultController extends Controller
{

    /**
     * Your controller action to fetch the list
     */
    public function actionComuniList($q = null)
    {
        $query = new Query;
        $tableName = Citta::tableName();

        $query->select('istat, comune, provincia')
            ->from($tableName)
            ->where('comune LIKE "%' . $q . '%"')
            ->orderBy('comune');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = [
                'id' => $d['istat'],
                'value' => $d['comune'] . ' (' . $d['provincia'] . ')',
                'flgNazione' => false
            ];
        }

        $tableName = Nazione::tableName();
        $query->select('id, nome_stati, cod_fisco, sigla_iso_3166_1_alpha_2_stati')
        ->from($tableName)
        ->where('nome_stati LIKE "%' . $q . '%"')
        ->orderBy('nome_stati');
        $command = $query->createCommand();
        $data = $command->queryAll();
        foreach ($data as $d) {
            $out[] = [
                'id' => $d['cod_fisco'],
                'value' => $d['nome_stati'] . ' (' . $d['sigla_iso_3166_1_alpha_2_stati'] . ')',
                'flgNazione' => true
            ];
        }
        
        echo Json::encode($out);
    }

    
    /**
     * Restituisce nome comune passandogli la chiave primaria
     */
    public function actionGetComuneNome($id){
        $q = Citta::findOne($id);
        return ArrayHelper::getValue($q,'comune','');
    }



    /**
     * Se la citta ha solo un CAP
     * altrimenti leggo dalla tabella multiCap
     */
    public function actionCapsList($q = null)
    {
        $model = Citta::findOne($q)->capModel;
        $cap = ArrayHelper::getValue($model,'cap', false);

        if (strpos($cap, '-')) {
            $query = new Query;
            $tableName = MultiCap::tableName();

            $query->select('istat, cap')
                ->from($tableName)
                ->where(['istat' => $q])
                ->orderBy('cap');
            $command = $query->createCommand();
            $data = $command->queryAll();
            $out = [];
            foreach ($data as $d) {
                $out[] = [
                    'id' => $d['cap'],
                    'text' => $d['cap']
                ];
            }
        } else {
            $out[] = [
                'id' => $cap,
                'text' => $cap
            ];
        }
        echo Json::encode($out);
    }
}
