<?php

namespace paskuale75\comuni\controllers;


use Faker\Provider\DateTime;
use paskuale75\comuni\models\Citta;
use paskuale75\comuni\models\MultiCap;
use Yii;
use yii\db\Query;
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
    public function actionComuniList($q = null) {
        $query = new Query;
        $tableName = Citta::tableName();

        $query->select('istat, comune, provincia')
            ->from($tableName)
            ->where('comune LIKE "%' . $q .'%"')
            ->orderBy('comune');
        $command = $query->createCommand();
        $data = $command->queryAll();
        $out = [];
        foreach ($data as $d) {
            $out[] = [
                'id'=>$d['istat'],
                'value' => $d['comune'].' ('.$d['provincia'].')'
            ];
        }
        echo Json::encode($out);
    }



    public function actionCapsList($q = null) {
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
                'id'=>$d['istat'],
                'value' => $d['cap']
            ];
        }
        echo Json::encode($out);
    }
}