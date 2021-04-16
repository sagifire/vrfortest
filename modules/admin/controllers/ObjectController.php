<?php

namespace app\modules\admin\controllers;

use app\models\ObjectModel;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class ObjectController
 * @package app\modules\admin\controllers
 */
class ObjectController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $objectsProvider = new ActiveDataProvider([
            'query' => ObjectModel::find(),
        ]);
        return $this->render('index', [
            'objectsProvider' => $objectsProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionCreate()
    {
        $objectModel = new ObjectModel();

        $request = \Yii::$app->request;
        if ($request->isPost && $objectModel->load($request->post())) {
            $objectModel->save();
        }

        return $this->render('create', [
            'objectModel' => $objectModel,
        ]);
    }

    /**
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $objectModel = ObjectModel::findOne($id);
        if (!$objectModel) {
            throw new NotFoundHttpException('Not found');
        }

        $request = \Yii::$app->request;
        if ($request->isPost && $objectModel->load($request->post())) {
            $objectModel->save();
        }

        return $this->render('update', [
            'objectModel' => $objectModel,
        ]);
    }

    public function actionDelete($id)
    {
        $objectModel = ObjectModel::findOne($id);
        if (!$objectModel) {
            throw new NotFoundHttpException('Not found');
        }
        $objectModel->delete();
        return $this->redirect(['/admin/task/index']);
    }
}