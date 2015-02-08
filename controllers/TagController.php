<?php

namespace cms\controllers;

use Yii;
use cms\components\Controller;
use cms\models\Tag as MainModel;
use cms\models\TagSearch as MainModelSearch;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TagController implements the CRUD actions for Tag model.
 */
class TagController extends Controller
{
    public function init() {
        $this->mainModel = MainModel::className();
        $this->mainModelSearch = MainModelSearch::className();
    }

    /**
     * Displays a single Tag model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render(Yii::$app->params['useSmarty'] ? 'view.tpl' : 'view', [
            'model' => $this->findModel($id),
        ]);
    }
}
